<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Page;
use Livewire\Component;

class PagesComponent extends Component
{
    //variable for page slug
    public $page_slug;
    //page slug mounted with pages
    public function mount($page_slug) {
        $this->page_slug = $page_slug;
    }
    //render method
    public function render()
    {
        //page slug find page
        $page = Page::where('slug',$this->page_slug)->first();
        //view pages component
        return view('livewire.front-end.pages-component',['page'=>$page])->layout('layouts.master');
    }
}
