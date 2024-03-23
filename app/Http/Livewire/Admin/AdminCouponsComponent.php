<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCouponsComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //coupon delete method
    public function deleteCoupon($coupon_id) {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        toastr()->success('Deleted successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //all coupons fetch
        $coupons = Coupon::orderBy('id','DESC')->paginate(10);
        //view of coupons component
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.master');
    }
}
