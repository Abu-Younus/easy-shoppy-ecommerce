<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.front-end.about-component')->layout('layouts.master');
    }
}
