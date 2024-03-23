<?php

namespace App\Http\Livewire\User;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;

class UserCouponsComponent extends Component
{
    //render method
    public function render()
    {
        //all coupons fetch with expiry date
        $coupons = Coupon::where('expiry_date','>=',Carbon::today())->get();
        //view customer coupons component
        return view('livewire.user.user-coupons-component',['coupons'=>$coupons])->layout('layouts.master');
    }
}
