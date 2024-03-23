<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;

class CartCountComponent extends Component
{
    //lesteners of refresh cart component
    protected $listeners = ['refreshComponent'=>'$refresh'];
    //render method
    public function render()
    {
        return view('livewire.front-end.cart-count-component');
    }
}
