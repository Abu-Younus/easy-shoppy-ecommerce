<?php

namespace App\Http\Livewire\Admin;

use App\Mail\RefundCompleteMail;
use App\Mail\RefundDeclinedMail;
use App\Models\ReturnProduct;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class AdminReturnOrdersComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //transaction status update method
    public function updateTransactionStatus($transaction_id,$status) {
        $transaction = Transaction::find($transaction_id);
        $transaction->status = $status;

        //order data fetch
        $order = Order::where('id',$transaction->order->id)->first();
        //setting data fetch
        $setting = Setting::where('id','DESC')->first();

        if($status == "refunded") {
            $transaction->refunded_date = DB::raw('CURRENT_DATE');
            $this->sendRefundCompletedMail($order,$setting);
        }
        else if($status == "declined") {
            $transaction->declined_date = DB::raw('CURRENT_DATE');
            $this->sendRefundDeclinedMail($order,$setting);
        }

        $transaction->save();
        toastr()->success('Status updated!');
    }

    //refund completed mail sent method
    public function sendRefundCompletedMail($order,$setting) {
        Mail::to($order->email)->send(new RefundCompleteMail($order,$setting));
    }

    //refund declined mail sent method
    public function sendRefundDeclinedMail($order,$setting) {
        Mail::to($order->email)->send(new RefundDeclinedMail($order,$setting));
    }

    //render method
    public function render()
    {
        //all return orders fetch
        $returnOrders = ReturnProduct::orderBy('id','DESC')->paginate(12);
        //view of return orders component
        return view('livewire.admin.admin-return-orders-component',['returnOrders'=>$returnOrders])->layout('layouts.master');
    }
}
