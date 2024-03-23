<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AdminEditUserRoleComponent extends Component
{
    //user role update form all variables
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $categories;
    public $brands;
    public $products;
    public $pickup_points;
    public $warehouses;
    public $home_slider;
    public $sale_setting;
    public $offers;
    public $orders;
    public $return_orders;
    public $blog_categories;
    public $blogs;
    public $user_role;
    public $contact_messages;
    public $product_questions;
    public $tickets;
    public $all_reports;
    public $settings;
    //mount function of user id to fetch retrive user data with database
    public function mount($user_id) {
        $this->user_id = $user_id;
        $userRole = User::where('id',$this->user_id)->first();
        $this->name = $userRole->name;
        $this->email = $userRole->email;
        $this->password = Hash::check($userRole->password, $this->password);
        $this->categories = $userRole->categories;
        $this->brands = $userRole->brands;
        $this->products = $userRole->products;
        $this->pickup_points = $userRole->pickup_points;
        $this->warehouses = $userRole->warehouses;
        $this->home_slider = $userRole->home_slider;
        $this->sale_setting = $userRole->sale_setting;
        $this->offers = $userRole->offers;
        $this->orders = $userRole->orders;
        $this->return_orders = $userRole->return_orders;
        $this->blog_categories = $userRole->blog_categories;
        $this->blogs = $userRole->blogs;
        $this->user_role = $userRole->user_role;
        $this->contact_messages = $userRole->contact_messages;
        $this->product_questions = $userRole->product_questions;
        $this->tickets = $userRole->tickets;
        $this->all_reports = $userRole->all_reports;
        $this->settings = $userRole->settings;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'email'=>'required|email',
            'password'=>'required|min:8|max:16',
        ]);
    }
    //user role update method
    public function updateUserRole() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'email'=>'required|email',
            'password'=>'required|min:8|max:16',
        ]);
        //user role update data store to database
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->utype = 'ROLE_ADM';
        $user->categories = $this->categories;
        $user->brands = $this->brands;
        $user->products = $this->products;
        $user->pickup_points = $this->pickup_points;
        $user->warehouses = $this->warehouses;
        $user->home_slider = $this->home_slider;
        $user->sale_setting = $this->sale_setting;
        $user->offers = $this->offers;
        $user->orders = $this->orders;
        $user->return_orders = $this->return_orders;
        $user->blog_categories = $this->blog_categories;
        $user->blogs = $this->blogs;
        $user->contact_messages = $this->contact_messages;
        $user->product_questions = $this->product_questions;
        $user->tickets = $this->tickets;
        $user->all_reports = $this->all_reports;
        $user->settings = $this->settings;

        $user->save();

        toastr()->success('User role has been updated!');
    }
    //render method
    public function render()
    {
        //view of edit user role component
        return view('livewire.admin.admin-edit-user-role-component')->layout('layouts.master');
    }
}
