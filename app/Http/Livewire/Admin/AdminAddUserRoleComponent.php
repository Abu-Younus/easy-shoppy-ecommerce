<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AdminAddUserRoleComponent extends Component
{
    //user role store form all variables
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
    //all user role initialize to mount function
    public function mount() {
        $this->categories = 0;
        $this->brands = 0;
        $this->products = 0;
        $this->pickup_points = 0;
        $this->warehouses = 0;
        $this->home_slider = 0;
        $this->sale_setting = 0;
        $this->offers = 0;
        $this->orders = 0;
        $this->return_orders = 0;
        $this->blog_categories = 0;
        $this->blogs = 0;
        $this->user_role = 0;
        $this->contact_messages = 0;
        $this->product_questions = 0;
        $this->tickets = 0;
        $this->all_reports = 0;
        $this->settings = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:16',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->categories = 0;
        $this->brands = 0;
        $this->products = 0;
        $this->pickup_points = 0;
        $this->warehouses = 0;
        $this->home_slider = 0;
        $this->sale_setting = 0;
        $this->offers = 0;
        $this->orders = 0;
        $this->return_orders = 0;
        $this->blog_categories = 0;
        $this->blogs = 0;
        $this->user_role = 0;
        $this->contact_messages = 0;
        $this->product_questions = 0;
        $this->tickets = 0;
        $this->all_reports = 0;
        $this->settings = 0;
    }
    //user role store method
    public function storeUserRole() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:16',
        ]);
        //user role store database
        $user = new User();
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
        //user profile information store
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $this->resetForm();
        toastr()->success('User role has been created!');
    }
    //render method
    public function render()
    {
        //view of add user role component
        return view('livewire.admin.admin-add-user-role-component')->layout('layouts.master');
    }
}
