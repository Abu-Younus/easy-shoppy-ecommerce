<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Auth;

class AdminDashboardSidebarComponent extends Component
{
    //render method
    public function render()
    {
        //users fetch to Admin and Role Admin
        $user = User::where('id',Auth::user()->id)->where('utype','ADM')->orWhere('utype','ROLE_ADM')->first();
        //view of admin dashboard sidebar component
        return view('livewire.admin.admin-dashboard-sidebar-component',['user'=>$user]);
    }
}
