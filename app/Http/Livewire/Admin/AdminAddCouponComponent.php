<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    //coupon store form variables
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields, [
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->code = '';
        $this->type = null;
        $this->value = '';
        $this->cart_value = '';
        $this->expiry_date = '';
    }
    //coupon store method
    public function storeCoupon() {
        //form validation
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required',
        ]);
        //coupon store database
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        $this->resetForm();
        toastr()->success('Added successfully!');
    }
    //render method
    public function render()
    {
        //view of add coupon component
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.master');
    }
}
