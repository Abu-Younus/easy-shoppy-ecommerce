<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Auth;
use DB;

class UserOrderDetailsComponent extends Component
{
    //order id variable
    public $order_id;
    //order id fetch to mounted method
    public function mount($order_id) {
        $this->order_id = $order_id;
    }
    //cancel order method
    public function cancelOrder() {
        $order = Order::where('order_id',$this->order_id)->first();
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        toastr()->success('Order has been canceled!', 'Congrats');
    }
    //render method
    public function render()
    {
        //single order details fetch
        $order = Order::where('user_id',Auth::user()->id)->where('order_id',$this->order_id)->first();
        //view customer order details component
        return view('livewire.user.user-order-details-component',['order'=>$order])->layout('layouts.master');
    }
}
