<?php

namespace App\Http\Livewire\Admin;

use App\Mail\OrderedMail;
use App\Mail\PackedMail;
use App\Mail\ShippedMail;
use App\Mail\DeliveredMail;
use App\Mail\RefundProgressMail;
use App\Mail\CanceledMail;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class AdminOrderComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //search for orders to order status, ordered date and payment mode variable
    public $order_status;
    public $ordered_date;
    public $payment_mode;
    //order status update method
    public function updateOrderStatus($order_id,$status) {
        $order = Order::find($order_id);
        $order->status = $status;
        $setting = Setting::orderBy('id','DESC')->first();

        if($status == "ordered") {
            $order->ordered_date = DB::raw('CURRENT_DATE');
            $this->sendOrderedMail($order,$setting);
        }
        else if($status == "packed") {
            $order->packed_date = DB::raw('CURRENT_DATE');
            $this->sendPackedMail($order,$setting);
        }
        else if($status == "shipped") {
            $order->shipped_date = DB::raw('CURRENT_DATE');
            $this->sendShippedMail($order,$setting);
        }
        else if($status == "delivered") {
            $order->delivered_date = DB::raw('CURRENT_DATE');
            $this->sendDeliveredMail($order,$setting);
        }
        else if($status == "refund") {
            $order->refund_date = DB::raw('CURRENT_DATE');
            $this->sendRefundProgressMail($order,$setting);
        }
        else if($status == "canceled") {
            $order->canceled_date = DB::raw('CURRENT_DATE');
            $this->sendCanceledMail($order,$setting);
        }
        $order->save();
        toastr()->success('Order status updated!');
    }

    //ordered mail sent method
    public function sendOrderedMail($order,$setting) {
        Mail::to($order->email)->send(new OrderedMail($order,$setting));
    }

    //packed mail sent method
    public function sendPackedMail($order,$setting) {
        Mail::to($order->email)->send(new PackedMail($order,$setting));
    }

    //shipped mail sent method
    public function sendShippedMail($order,$setting) {
        Mail::to($order->email)->send(new ShippedMail($order,$setting));
    }

    //delivered mail sent method
    public function sendDeliveredMail($order,$setting) {
        Mail::to($order->email)->send(new DeliveredMail($order,$setting));
    }

    //refund progress mail sent method
    public function sendRefundProgressMail($order,$setting) {
        Mail::to($order->email)->send(new RefundProgressMail($order,$setting));
    }

    //canceled mail sent method
    public function sendCanceledMail($order,$setting) {
        Mail::to($order->email)->send(new CanceledMail($order,$setting));
    }

    //render method
    public function render()
    {
        //search for orders to order status, ordered date and payment mode
        if($this->order_status == 'pending') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->order_status == 'ordered') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->order_status == 'packed') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->order_status == 'shipped') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->order_status == 'delivered') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->order_status == 'refund') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->order_status == 'canceled') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->payment_mode == 'cod') {
            $orders = Order::where('payment_mode', $this->payment_mode)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->payment_mode == 'card') {
            $orders = Order::where('payment_mode', $this->payment_mode)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->payment_mode == 'bkash') {
            $orders = Order::where('payment_mode', $this->payment_mode)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->ordered_date) {
            $orders = Order::where('ordered_date',$this->ordered_date)->orderBy('id','DESC')->paginate(12);
        }
        else {
            $orders = Order::orderBy('id','DESC')->paginate(12);
        }
        //view of order component
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.master');
    }
}
