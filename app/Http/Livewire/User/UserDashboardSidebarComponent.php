<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use Livewire\Component;
use Auth;

class UserDashboardSidebarComponent extends Component
{
    //render method
    public function render()
    {
        //customer profile fetch
        $customerProfile = Profile::where('user_id',Auth::user()->id)->first();
        //view customer dashboard sidebar component
        return view('livewire.user.user-dashboard-sidebar-component',['customerProfile'=>$customerProfile]);
    }
}
