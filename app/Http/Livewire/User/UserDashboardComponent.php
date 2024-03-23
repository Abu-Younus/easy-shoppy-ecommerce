<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Auth;

class UserDashboardComponent extends Component
{
    //render method
    public function render()
    {
        //customer recent orders fetch
        $orders = Order::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get()->take(10);
        //customer total order cost
        $totalCost = Order::where('status','!=','canceled')->where('user_id',Auth::user()->id)->sum('total');
        //customer today order cost
        $todayCost = Order::where('status','!=','canceled')->where('user_id',Auth::user()->id)->whereDate('created_at',Carbon::today())->sum('total');
        //customer total order purchase count
        $totalPurchase = Order::where('status','!=','canceled')->where('user_id',Auth::user()->id)->count();
        //customer today order purchase count
        $todayPurchase = Order::where('status','!=','canceled')->where('user_id',Auth::user()->id)->whereDate('created_at',Carbon::today())->count();
        //customer total delivered order count
        $totalDelivered = Order::where('status','delivered')->where('user_id',Auth::user()->id)->count();
        //customer total canceled order count
        $totalCanceled = Order::where('status','canceled')->where('user_id',Auth::user()->id)->count();
        //view customer dashboard component
        return view('livewire.user.user-dashboard-component',[
            'orders'=>$orders,
            'totalCost'=>$totalCost,
            'todayCost'=>$todayCost,
            'totalPurchase'=>$totalPurchase,
            'todayPurchase'=>$todayPurchase,
            'totalDelivered'=>$totalDelivered,
            'totalCanceled'=>$totalCanceled
        ])->layout('layouts.master');
    }
}
