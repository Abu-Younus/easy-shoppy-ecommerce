<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditPagesComponent extends Component
{
    //page update form all variables
    public $position;
    public $name;
    public $title;
    public $slug;
    public $description;
    public $page_slug;
    public $page_id;
    //mount function of page slug to retrive page data with database
    public function mount($page_slug) {
        $this->page_slug = $page_slug;
        $page = Page::where('slug',$page_slug)->first();
        $this->position = $page->position;
        $this->name = $page->name;
        $this->slug = $page->slug;
        $this->title = $page->title;
        $this->description = $page->description;
        $this->page_id = $page->id;
    }
    //generate slug to page name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'position'=>'required|numeric',
            'name'=>'required|min:3|max:255',
            'title'=>'required|min:3|max:255',
            'slug'=>'required',
            'description'=>'required|min:250',
        ]);
    }
    //page update method
    public function updatePage() {
        //form validation
        $this->validate([
            'position'=>'required|numeric',
            'name'=>'required|min:3|max:255',
            'title'=>'required|min:3|max:255',
            'slug'=>'required',
            'description'=>'required|min:250',
        ]);
        //page update data store database
        $page = Page::find($this->page_id);
        $page->position = $this->position;
        $page->name = $this->name;
        $page->title = $this->title;
        $page->slug = $this->slug;
        $page->description = $this->description;
        $page->save();

        toastr()->success('Page Updated!', 'Congrats');
    }
    //render method
    public function render()
    {
        //view of edit page component
        return view('livewire.admin.admin-edit-pages-component')->layout('layouts.master');
    }
}
