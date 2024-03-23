<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Auth;

class CartComponent extends Component
{
    //variable for coupon discount after cart total
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    //Quantity Increase Method
    public function increaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('front-end.cart-count-component','refreshComponent');
    }
    //Quantity Decrease Method
    public function decreaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        if($product->qty > 1) {
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId,$qty);
            $this->emitTo('front-end.cart-count-component','refreshComponent');
        }
    }
    //Cart Single Item Delete Method
    public function destroy($rowId) {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Item has been removed!');
        $this->emitTo('front-end.cart-count-component','refreshComponent');
        toastr()->success('Item is removed!');
    }
    //Cart All Item Delete Method
    public function destroyAll() {
        Cart::instance('cart')->destroy();
        $this->emitTo('front-end.cart-count-component','refreshComponent');
        toastr()->success('All item is clear!');
    }
    //Cart Item Move To Save For Later Method
    public function switchToSaveForLater($rowId) {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,$item->qty,$item->price)->associate('App\Models\Product');
        $this->emitTo('front-end.cart-count-component','refreshComponent');
        toastr()->success('Added successfully!');
    }
    //Save For Later Move To Cart Item Method
    public function moveToCart($rowId) {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,$item->qty,$item->price)->associate('App\Models\Product');
        $this->emitTo('front-end.cart-count-component','refreshComponent');
        toastr()->success('Move to cart successfully!');
    }
    //Save For Later Delete Method
    public function deleteFromSaveForLater($rowId) {
        Cart::instance('saveForLater')->remove($rowId);
        toastr()->success('Item is removed!');
    }
    //Coupon Code Apply Method
    public function applyCouponCode() {
        $coupon = Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon) {
            toastr()->error('Code is invalid!');
            return;
        }

        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value,
        ]);
    }
    //Coupon Discount Calculate Method
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
    //Remove Coupon Method
    public function removeCoupon() {
        session()->forget('coupon');
    }
    //Auth Check For Checkout
    public function checkout() {
        if(Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }
    //Discount Or Non Discount Amount Set For Checkout Method
    public function setAmountForCheckout() {
        if(!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }

        if($this->productsAreNoLongerAvailable()) {
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
    }
    //Database Product Quantity Check with Cart Item Quantity Method
    public function productsAreNoLongerAvailable() {
        foreach(Cart::instance('cart')->content() as $item) {
            $product = Product::find($item->model->id);
            if($product->quantity >= $item->qty) {
                return true;
            }
        }
        return false;
    }
    //Render Method
    public function render()
    {
        //Coupon Check With Session
        if(session()->has('coupon')) {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
        //Discount Or Non Discount Amount Set For Checkout Method
        $this->setAmountForCheckout();
        //Auth Check For Cart Item and Save For Later Item Store
        if(Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('saveForLater')->store(Auth::user()->email);
        }
        //View Cart Component
        return view('livewire.front-end.cart-component')->layout('layouts.master');
    }
}
