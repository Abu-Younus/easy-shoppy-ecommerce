<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AdminSettingComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //website setting update form all variables
    public $currency;
    public $email;
    public $support_email;
    public $phone;
    public $phone2;
    public $address;
    public $logo;
    public $newlogo;
    public $favicon;
    public $newfavicon;
    public $map;
    public $twiter;
    public $facebook;
    public $pinterest;
    public $instagram;
    public $youtube;
    //mount function of website setting data retrive with database
    public function mount() {
        $setting = Setting::find(1);
        //website setting non null check to retrive data
        if($setting != null) {
            $this->currency = $setting->currency;
            $this->email = $setting->email;
            $this->support_email = $setting->support_email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twiter = $setting->twiter;
            $this->facebook = $setting->facebook;
            $this->pinterest = $setting->pinterest;
            $this->instagram = $setting->instagram;
            $this->youtube = $setting->youtube;
        }
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'currency'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'address'=>'required|min:5|max:255',
            'map'=>'required',
        ]);
        if($this->support_email) {
            $this->validateOnly($fields,[
                'support_email'=>'required|email',
            ]);
        }
        if($this->phone2) {
            $this->validateOnly($fields,[
                'phone2'=>'required|numeric',
            ]);
        }
        if($this->logo) {
            $this->validateOnly($fields,[
                'logo'=>'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($this->favicon) {
            $this->validateOnly($fields,[
                'favicon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //website setting store method
    public function saveSettings() {
        //form validation
        $this->validate([
            'currency'=>'required',
            'email'=>'required|email',
            'phone2'=>'required|numeric',
            'address'=>'required|min:5|max:255',
            'map'=>'required',
        ]);

        if($this->support_email) {
            $this->validate([
                'support_email'=>'required|email',
            ]);
        }
        if($this->phone2) {
            $this->validate([
                'phone2'=>'required|numeric',
            ]);
        }

        if($this->logo) {
            $this->validate([
                'logo'=>'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($this->favicon) {
            $this->validate([
                'favicon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //website setting fetch
        $setting = Setting::find(1);
        //website setting null check to new website setting store with database
        if(!$setting) {
            $setting = new Setting();
        }

        $setting->currency = $this->currency;
        $setting->email = $this->email;
        $setting->support_email = $this->support_email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        //website logo & favicon null check
        if($setting->logo == null && $setting->favicon == null) {
            //website logo check
            if($this->logo) {
                $logoName = Carbon::now()->timestamp. '.' .$this->logo->extension();
                Image::make($this->logo)->resize(250, 60)->save('assets/images/logo-favicon/'.$logoName);
                $setting->logo = $logoName;
            }
            //website favicon check
            if($this->favicon) {
                $faviconName = Carbon::now()->timestamp. '.' .$this->favicon->extension();
                Image::make($this->favicon)->resize(32, 32)->save('assets/images/logo-favicon/'.$faviconName);
                $setting->favicon = $faviconName;
            }
        }

        $setting->twiter = $this->twiter;
        $setting->facebook = $this->facebook;
        $setting->pinterest = $this->pinterest;
        $setting->instagram = $this->instagram;
        $setting->youtube = $this->youtube;
        $setting->save();
        toastr()->success('Saved successfully!', 'Congrats');

    }
    //render method
    public function render()
    {
        //view of admin website setting component
        return view('livewire.admin.admin-setting-component')->layout('layouts.master');
    }
}
