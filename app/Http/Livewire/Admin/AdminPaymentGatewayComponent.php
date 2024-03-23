<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminPaymentGatewayComponent extends Component
{
    //render method
    public function render()
    {
        //view of payment gateway component
        return view('livewire.admin.admin-payment-gateway-component')->layout('layouts.master');
    }
}
