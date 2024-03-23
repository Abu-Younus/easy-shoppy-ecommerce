<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Auth;

class UserOrdersComponent extends Component
{
    //render method
    public function render()
    {
        //customer all orders fetch
        $orders = Order::where('user_id',Auth::user()->id)->paginate(12);
        //view customer orders component
        return view('livewire.user.user-orders-component',['orders'=>$orders])->layout('layouts.master');
    }
}
