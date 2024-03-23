<?php

namespace App\Http\Livewire\FrontEnd;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Setting;
use Carbon\Carbon;
use Livewire\Component;
use Auth;
use Cart;
use Stripe;
use Mail;

class CheckoutComponent extends Component
{
    //variable for billing address
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $country;
    public $zipcode;
    public $state;
    public $city;
    //variable for shipping different
    public $ship_to_different;
    public $shipping_firstname;
    public $shipping_lastname;
    public $shipping_email;
    public $shipping_mobile;
    public $shipping_line1;
    public $shipping_line2;
    public $shipping_country;
    public $shipping_zipcode;
    public $shipping_state;
    public $shipping_city;
    //variable for thank you route
    public $thankyou;
    //payment mode
    public $paymentmode;
    //stripe card payment variable
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;
    //coupon variable
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'firstname'=>'required|min:2|max:25',
            'lastname'=>'required|min:3|max:50',
            'email'=>'required|email',
            'mobile'=>'required|numeric',
            'line1'=>'required|max:255',
            'country'=>'required',
            'zipcode'=>'required|numeric',
            'state'=>'required',
            'city'=>'required',
            'paymentmode'=>'required',
        ]);
        //shipping different check validation
        if($this->ship_to_different) {
            $this->validateOnly($fields,[
                'shipping_firstname'=>'required|min:2|max:25',
                'shipping_lastname'=>'required|min:3|max:50',
                'shipping_email'=>'required|email',
                'shipping_mobile'=>'required|numeric',
                'shipping_line1'=>'required|max:255',
                'shipping_country'=>'required',
                'shipping_zipcode'=>'required|numeric',
                'shipping_state'=>'required',
                'shipping_city'=>'required',
            ]);
        }
        //stripe payment form validation
        if($this->paymentmode == 'card') {
            $this->validateOnly($fields, [
                'card_no'=>'required|numeric',
                'exp_month'=>'required|numeric',
                'exp_year'=>'required|numeric',
                'cvc'=>'required|numeric',
            ]);
        }
    }
    //apply coupon code method
    public function applyCouponCode() {
        $coupon = Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon) {
            toastr()->error('Code is invalid!', 'Oops');
            return;
        }

        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value,
        ]);
    }
    //after coupon discount calculate method
    public function calculateDiscounts() {
        if(session()->has('coupon')) {
            if(session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }
    //set amount checkout page method
    public function setAmountForCheckout() {
        if(!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon')) {
            session()->put('checkout',[
                'discount'=> $this->discount,
                'subtotal'=> $this->subtotalAfterDiscount,
                'tax'=> $this->taxAfterDiscount,
                'total'=> $this->totalAfterDiscount
            ]);
        }
        else {
            session()->put('checkout',[
                'discount'=> 0,
                'subtotal'=> Cart::instance('cart')->subtotal(),
                'tax'=> Cart::instance('cart')->tax(),
                'total'=> Cart::instance('cart')->total()
            ]);
        }
    }
    //place order method
    public function placeOrder() {
        //form validation wiht billing and payment mode
        $this->validate([
            'firstname'=>'required|min:2|max:25',
            'lastname'=>'required|min:3|max:50',
            'email'=>'required|email',
            'mobile'=>'required|numeric',
            'line1'=>'required|max:255',
            'country'=>'required',
            'zipcode'=>'required|numeric',
            'state'=>'required',
            'city'=>'required',
            'paymentmode'=>'required',
        ]);
        //form validation shipping different
        if($this->ship_to_different) {
            $this->validate([
                'shipping_firstname'=>'required|min:2|max:25',
                'shipping_lastname'=>'required|min:3|max:50',
                'shipping_email'=>'required|email',
                'shipping_mobile'=>'required|numeric',
                'shipping_line1'=>'required|max:255',
                'shipping_country'=>'required',
                'shipping_zipcode'=>'required|numeric',
                'shipping_state'=>'required',
                'shipping_city'=>'required',
            ]);
        }
        //form validation stripe card
        if($this->paymentmode == 'card') {
            $this->validate([
                'card_no'=>'required|numeric',
                'exp_month'=>'required|numeric',
                'exp_year'=>'required|numeric',
                'cvc'=>'required|numeric',
            ]);
        }
        //setting fetch
        $setting = Setting::first();
        //database product quantity and item quantity check
        if(!$this->productsAreNoLongerAvailable()) {
            session()->flash('quantity_error','Sorry! One of the items in your cart is no longer available.');
        }
        //order place
        else
        {
            //order table data save
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->order_id = rand(11111111,99999999);
            $order->subtotal = session()->get('checkout')['subtotal'];
            $order->discount = session()->get('checkout')['discount'];
            $order->tax = session()->get('checkout')['tax'];
            $order->total = session()->get('checkout')['total'];
            $order->first_name = $this->firstname;
            $order->last_name = $this->lastname;
            $order->email = $this->email;
            $order->mobile = $this->mobile;
            $order->line1 = $this->line1;
            $order->line2 = $this->line2;
            $order->country = $this->country;
            $order->zipcode = $this->zipcode;
            $order->state = $this->state;
            $order->city = $this->city;
            if($this->paymentmode == 'cod') {
                $order->status = 'pending';
                $order->payment_mode = 'cod';
            }
            else if($this->paymentmode == 'card') {
                $order->status = 'ordered';
                $order->payment_mode = 'card';
                $order->ordered_date = Carbon::now()->format('Y-m-d');
            }
            $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
            $order->save();
            //orderItem table data save
            foreach(Cart::instance('cart')->content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                if($item->options) {
                    $orderItem->options = serialize($item->options);
                } else {
                    $orderItem->options = null;
                }
                $orderItem->user_id = Auth::user()->id;
                $orderItem->save();
            }
            //shipping table data save
            if($this->ship_to_different) {
                $shipping = new Shipping();
                $shipping->order_id = $order->id;
                $shipping->first_name = $this->shipping_firstname;
                $shipping->last_name = $this->shipping_lastname;
                $shipping->email = $this->shipping_email;
                $shipping->mobile = $this->shipping_mobile;
                $shipping->line1 = $this->shipping_line1;
                $shipping->line2 = $this->shipping_line2;
                $shipping->country = $this->shipping_country;
                $shipping->zipcode = $this->shipping_zipcode;
                $shipping->state = $this->shipping_state;
                $shipping->city = $this->shipping_city;
                $shipping->save();
            }
            //payment mode check statement
            if($this->paymentmode == 'cod') {
            $this->makeTransaction($order->id,'pending');
            $this->afterOrderProductQuantity();
            $this->resetCart();
            toastr()->success('Your order is successfully placed!');
            }
            else if($this->paymentmode == 'card') {
                $stripe = Stripe::make(env('STRIPE_KEY'));

                try {
                    //stripe token create
                    $token = $stripe->tokens()->create([
                        'card' => [
                            'number'=>$this->card_no,
                            'exp_month'=>$this->exp_month,
                            'exp_year'=>$this->exp_year,
                            'cvc'=>$this->cvc
                        ]
                    ]);
                    //token check
                    if(!isset($token['id'])) {
                        toastr()->error('The stripe token was not generate correctly!');
                        $this->thankyou = 0;
                    }
                    //stripe customer info create
                    $customer = $stripe->customers()->create([
                        'name'=>$this->firstname. ' ' .$this->lastname,
                        'email'=>$this->email,
                        'phone'=>$this->mobile,
                        'address'=>[
                            'line1'=>$this->line1,
                            'postal_code'=>$this->zipcode,
                            'city'=>$this->city,
                            'state'=>$this->state,
                            'country'=>$this->country
                        ],
                        'shipping'=>[
                            'name'=>$this->firstname. ' ' .$this->lastname,
                            'address'=>[
                                'line1'=>$this->line1,
                                'postal_code'=>$this->zipcode,
                                'city'=>$this->city,
                                'state'=>$this->state,
                                'country'=>$this->country
                            ],
                        ],
                        'source'=>$token['id']
                    ]);
                    //setting currency check
                    if($setting->currency == '$') {
                        $charge = $stripe->charges()->create([
                            'customer'=>$customer['id'],
                            'currency'=>'USD',
                            'amount'=>session()->get('checkout')['total'],
                            'description'=>'Payment for order no. ' .$order->order_id
                        ]);
                    }
                    if($setting->currency == '৳') {
                        $charge = $stripe->charges()->create([
                            'customer'=>$customer['id'],
                            'currency'=>'BDT',
                            'amount'=>session()->get('checkout')['total'],
                            'description'=>'Payment for order no. ' .$order->order_id
                        ]);
                    }
                    if($setting->currency == '₹') {
                        $charge = $stripe->charges()->create([
                            'customer'=>$customer['id'],
                            'currency'=>'Rs',
                            'amount'=>session()->get('checkout')['total'],
                            'description'=>'Payment for order no. ' .$order->order_id
                        ]);
                    }
                    //status succeeded check
                    if($charge['status'] == 'succeeded') {
                        $this->makeTransaction($order->id,'approved');
                        $this->afterOrderProductQuantity();
                        $this->resetCart();
                        toastr()->success('Your order is successfully placed!');
                    }
                    else {
                        toastr()->error('Error in transaction!');
                        $this->thankyou = 0;
                    }
                } catch(Exception $e) {
                    toastr()->error($e->getMessage());
                    $this->thankyou = 0;
                }
            }
            //sent order confirmation for customer email
            $this->sendOrderConfirmationMail($order,$setting);
        }
    }
    //product are no longer available check method
    public function productsAreNoLongerAvailable() {
        foreach(Cart::instance('cart')->content() as $item) {
            $product = Product::find($item->model->id);
            if($product->quantity >= $item->qty) {
                return true;
            }
        }
        return false;
    }
    //cart item destroy after order place
    public function resetCart() {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    //transaction info save method
    public function makeTransaction($order_id,$status) {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }
    //order confirmation mail sent method
    public function sendOrderConfirmationMail($order,$setting) {
        Mail::to($order->email)->send(new OrderConfirmationMail($order,$setting));
    }
    //order place after product quantity decrease method
    public function afterOrderProductQuantity() {
        foreach(Cart::instance('cart')->content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity'=>$product->quantity - $item->qty]);
        }
    }
    //verify for checkout page method
    public function verifyForCheckout() {
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        else if($this->thankyou) {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }
    //render method
    public function render()
    {
        //session has coupon check
        if(session()->has('coupon')) {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
        //set amount for checkout method
        $this->setAmountForCheckout();
        //verify for checkout method
        $this->verifyForCheckout();
        //view checkout component
        return view('livewire.front-end.checkout-component')->layout('layouts.master');
    }
}
