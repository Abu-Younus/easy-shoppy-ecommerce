<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;
use DB;

class AdminOrderDetailsComponent extends Component
{
    //order id variable
    public $order_id;
    //mount function of order id to fetch order details
    public function mount($order_id) {
        $this->order_id = $order_id;
    }
    //transaction status update method
    public function updateTransactionStatus($transaction_id,$status) {
        $transaction = Transaction::find($transaction_id);
        $transaction->status = $status;

        if($status == "approved") {
            $transaction->approved_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "declined") {
            $transaction->declined_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "refunded") {
            $transaction->refunded_date = DB::raw('CURRENT_DATE');
        }
        $transaction->save();
        toastr()->success('Transaction status updated!');
    }
    //render method
    public function render()
    {
        //single order fetch to order details
        $order = Order::where('order_id',$this->order_id)->first();
        //view of order details component
        return view('livewire.admin.admin-order-details-component',['order'=>$order])->layout('layouts.master');
    }
}
