<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;

class ThankYouComponent extends Component
{
    //render method thank you component
    public function render()
    {
        return view('livewire.front-end.thank-you-component')->layout('layouts.master');
    }
}
