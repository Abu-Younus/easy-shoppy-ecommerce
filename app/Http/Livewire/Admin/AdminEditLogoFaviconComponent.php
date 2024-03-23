<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AdminEditLogoFaviconComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //logo favicon update form all variables
    public $logo;
    public $newlogo;
    public $favicon;
    public $newfavicon;
    public $setting_id;
    //mount function of setting id to retrive logo favicon image data with database
    public function mount($setting_id) {
        $this->setting_id = $setting_id;
        $setting = Setting::find($setting_id);
        $this->logo = $setting->logo;
        $this->favicon = $setting->favicon;
        $this->setting_id = $setting->id;
    }
    //form validation updated method
    public function updated($fields) {
        if($this->newlogo) {
            $this->validateOnly($fields,[
                'newlogo'=>'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($this->newfavicon) {
            $this->validateOnly($fields,[
                'newfavicon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //logo favicon update method
    public function updateLogoFavicon() {
        //form validation
        if($this->newlogo) {
            $this->validate([
                'newlogo'=>'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($this->newfavicon) {
            $this->validate([
                'newfavicon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //setting data fetch
        $setting = Setting::find($this->setting_id);
        //logo check
        if($this->newlogo) {
            if($setting->logo) {
                unlink('assets/images/logo-favicon'. '/' .$setting->logo);
            }
            $logoName = Carbon::now()->timestamp. '.' .$this->newlogo->extension();
            Image::make($this->newlogo)->resize(250, 60)->save('assets/images/logo-favicon/'.$logoName);
            $setting->logo = $logoName;
        }
        //favicon check
        if($this->newfavicon) {
            if($setting->favicon) {
                unlink('assets/images/logo-favicon'. '/' .$setting->favicon);
            }
            $faviconName = Carbon::now()->timestamp. '.' .$this->newfavicon->extension();
            Image::make($this->newfavicon)->resize(32, 32)->save('assets/images/logo-favicon/'.$faviconName);
            $setting->favicon = $faviconName;
        }
        $setting->save();
        toastr()->success('Updated successfully!');
    }
    //render method
    public function render()
    {
        //view of edit logo favicon component
        return view('livewire.admin.admin-edit-logo-favicon-component')->layout('layouts.master');
    }
}
