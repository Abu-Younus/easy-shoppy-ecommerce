<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;

class AdminProfileComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //admin profile update form all variables
    public $name;
    public $email;
    public $phone;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $country;
    public $zipcode;
    public $newimage;
    public $image;
    //admin password update form all variables
    public $current_password;
    public $password;
    public $password_confirmation;
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);
    }
    //mount function of admin profile data retrive with database
    public function mount() {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->profile->mobile;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->state = $user->profile->state;
        $this->country = $user->profile->country;
        $this->zipcode = $user->profile->zipcode;
        $this->image = $user->profile->image;
    }
    //update profile method
    public function updateProfile() {
        //admin data fetch
        $user = User::find(Auth::user()->id);
        //admin profile update data store to database
        $user->name = $this->name;
        $user->save();

        $user->profile->mobile = $this->phone;
        //admin profile image check
        if($this->newimage) {
            if($this->image) {
                unlink('assets/images/profile/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            Image::make($this->newimage)->resize(200, 200)->save('assets/images/profile/'.$imageName);
            $user->profile->image = $imageName;
        }
        //admin profile update data store to database
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->state = $this->state;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        $user->profile->save();
        toastr()->success('Profile updated successfully!');
    }
    //admin password change method
    public function changePassword() {
        //form validation
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);
        //admin password check
        if(Hash::check($this->current_password,Auth::user()->password)) {
            //admin password update
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            toastr()->success('Password has been updated!');
        }
        else {
            toastr()->error('Password does not matched!');
        }
    }
    //render method
    public function render()
    {
        //view of admin profile component
        return view('livewire.admin.admin-profile-component')->layout('layouts.master');
    }
}
