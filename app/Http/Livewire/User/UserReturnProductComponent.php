<?php

namespace App\Http\Livewire\User;

use App\Models\ReturnProduct;
use App\Models\Order;
use Livewire\Component;
use Auth;
use DB;

class UserReturnProductComponent extends Component
{
    //order id variable
    public $order_id;
    //return order form variable
    public $return_payment;
    public $return_reason;
    public $bkash_number;
    public $nagad_number;
    public $bank_name;
    public $account_number;
    //fetch order id mounted method
    public function mount($order_id) {
        $this->order_id = $order_id;
        $order = Order::where('order_id',$this->order_id)->first();
        //return order submit check
        $returnOrderCheck = ReturnProduct::where('user_id',Auth::user()->id)->where('order_id',$order->id)->first();
        if($returnOrderCheck) {
            return redirect()->route('user.orders');
        }
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'return_reason'=>'required|min:5|max:500',
            'return_payment'=>'required',
        ]);

        if($this->return_payment == 'bkash') {
            $this->validateOnly($fields,[
                'bkash_number'=>'required|min:11|numeric',
            ]);
        }

        if($this->return_payment == 'nagad') {
            $this->validateOnly($fields,[
                'nagad_number'=>'required|min:11|numeric',
            ]);
        }

        if($this->return_payment == 'account') {
            $this->validateOnly($fields,[
                'bank_name'=>'required',
                'account_number'=>'required|numeric',
            ]);
        }
    }
    //return order store method
    public function storeReturnProduct() {
        //form validation to return order
        $this->validate([
            'return_reason'=>'required|min:5|max:500',
            'return_payment'=>'required',
        ]);

        if($this->return_payment == 'bkash') {
            $this->validate([
                'bkash_number'=>'required|min:11|numeric',
            ]);
        }

        if($this->return_payment == 'nagad') {
            $this->validate([
                'nagad_number'=>'required|min:11|numeric',
            ]);
        }

        if($this->return_payment == 'account') {
            $this->validate([
                'bank_name'=>'required',
                'account_number'=>'required|numeric',
            ]);
        }
        //order id get order
        $order = Order::where('order_id',$this->order_id)->first();
        //return order submit to save database
        $returnProduct = new ReturnProduct();
        $returnProduct->user_id = Auth::user()->id;
        $returnProduct->order_id = $order->id;
        $returnProduct->return_reason = $this->return_reason;
        $returnProduct->return_payment = $this->return_payment;
        //return order payment details save database
        if($this->return_payment == 'bkash') {
            $returnProduct->bkash_number = $this->bkash_number;
        }
        if($this->return_payment == 'nagad') {
            $returnProduct->nagad_number = $this->nagad_number;
        }
        if($this->return_payment == 'account') {
            $returnProduct->bank_name = $this->bank_name;
            $returnProduct->account_number = $this->account_number;
        }
        $returnProduct->return_date = DB::raw('CURRENT_DATE');
        $returnProduct->save();
        //order table update
        $order->status = 'refund';
        $order->refund_date = DB::raw('CURRENT_DATE');
        $order->is_return_order = true;
        $order->save();

        toastr()->success('Product return request sent successfully!');
    }
    //render method
    public function render()
    {
        //view customer return order component
        return view('livewire.user.user-return-product-component')->layout('layouts.master');
    }
}
