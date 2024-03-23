<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    //lesteners of refresh wishlist component
    protected $listeners = ['refreshComponent'=>'$refresh'];
    //render method
    public function render()
    {
        return view('livewire.front-end.wishlist-count-component');
    }
}
