<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class AdminUserRoleComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //role admin delete method
    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();

        toastr()->success('user deleted successfully!');
    }
    //render method
    public function render()
    {
        //all role admin fetch
        $roleUsers = User::where('utype','ROLE_ADM')->orderBy('id','DESC')->paginate(12);
        //role admin profile fetch
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        //view of user role component
        return view('livewire.admin.admin-user-role-component',['roleUsers'=>$roleUsers,'profile'=>$profile])->layout('layouts.master');
    }
}
