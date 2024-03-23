<?php

namespace App\Http\Livewire\Admin;

use App\Models\Seo;
use Livewire\Component;

class AdminSEOComponent extends Component
{
    //SEO setting update form all variables
    public $meta_title;
    public $meta_author;
    public $meta_tags;
    public $meta_keyword;
    public $meta_description;
    public $google_verification;
    public $google_analytics;
    public $google_adsense;
    public $alexa_verification;
    //mount function of SEO setting data retrive with database
    public function mount() {
        $seo = Seo::find(1);
        //SEO setting non null check to retrive data
        if($seo != null) {
            $this->meta_title = $seo->meta_title;
            $this->meta_author = $seo->meta_author;
            $this->meta_tags = $seo->meta_tags;
            $this->meta_keyword = $seo->meta_keyword;
            $this->meta_description = $seo->meta_description;
            $this->google_verification = $seo->google_verification;
            $this->google_analytics = $seo->google_analytics;
            $this->google_adsense = $seo->google_adsense;
            $this->alexa_verification = $seo->alexa_verification;
        }
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'meta_title'=>'required|min:3|max:255',
            'meta_author'=>'required|min:3|max:255',
            'meta_tags'=>'required|min:3|max:255',
            'meta_keyword'=>'required|min:3|max:255',
            'meta_description'=>'required|min:50',
        ]);
    }
    //SEO setting store method
    public function saveSEO() {
        //form validation
        $this->validate([
            'meta_title'=>'required|min:3|max:255',
            'meta_author'=>'required|min:3|max:255',
            'meta_tags'=>'required|min:3|max:255',
            'meta_keyword'=>'required|min:3|max:255',
            'meta_description'=>'required|min:50',
        ]);
        //SEO setting fetch
        $seo = Seo::find(1);
        //SEO setting null check new SEO setting store with database
        if(!$seo) {
            $seo = new Seo();
        }
        $seo->meta_title = $this->meta_title;
        $seo->meta_author = $this->meta_author;
        $seo->meta_tags = $this->meta_tags;
        $seo->meta_keyword = $this->meta_keyword;
        $seo->meta_description = $this->meta_description;
        $seo->google_verification = $this->google_verification;
        $seo->google_analytics = $this->google_analytics;
        $seo->google_adsense = $this->google_adsense;
        $seo->alexa_verification = $this->alexa_verification;
        $seo->save();

        toastr()->success('SEO settings save successfully!','Congrats');
    }
    //render method
    public function render()
    {
        //view of SEO component
        return view('livewire.admin.admin-s-e-o-component')->layout('layouts.master');
    }
}
