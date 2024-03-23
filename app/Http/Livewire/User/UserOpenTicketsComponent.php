<?php

namespace App\Http\Livewire\User;

use App\Models\OpenTicket;
use Livewire\Component;
use Auth;

class UserOpenTicketsComponent extends Component
{
    //render method
    public function render()
    {
        //customer all tickets fetch
        $tickets = OpenTicket::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        //view customer open tickets component
        return view('livewire.user.user-open-tickets-component',['tickets'=>$tickets])->layout('layouts.master');
    }
}
