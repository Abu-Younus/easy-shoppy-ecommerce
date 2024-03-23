<?php

namespace App\Http\Livewire\Admin;

use App\Models\ReturnProduct;
use Livewire\Component;

class AdminReturnOrderDetailsComponent extends Component
{
    //return order id variable to retrive return order details
    public $return_order_id;
    //mount function of return order id to retrive return order details with database
    public function mount($return_order_id) {
        $this->return_order_id = $return_order_id;
    }
    //render method
    public function render()
    {
        //return order fetch
        $returnOrder = ReturnProduct::where('id',$this->return_order_id)->first();
        //view of return order details component
        return view('livewire.admin.admin-return-order-details-component',['returnOrder'=>$returnOrder])->layout('layouts.master');
    }
}
