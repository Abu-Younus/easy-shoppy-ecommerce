<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    //coupon update form all variables
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public $coupon_id;
    //mount function of coupon id to retrive coupon data with database
    public function mount($coupon_id) {
        $coupon = Coupon::find($coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->expiry_date = $coupon->expiry_date;
        $this->coupon_id = $coupon->id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields, [
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required',
        ]);
    }
    //coupon update method
    public function updateCoupon() {
        //form validation
        $this->validate([
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required',
        ]);
        //coupon update data store database
        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //view of edit coupon component
        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.master');
    }
}
