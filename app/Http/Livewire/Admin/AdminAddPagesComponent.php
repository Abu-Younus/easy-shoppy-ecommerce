<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddPagesComponent extends Component
{
    //page store form all variables
    public $position;
    public $name;
    public $title;
    public $slug;
    public $description;
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
            'slug'=>'required|unique:pages',
            'description'=>'required|min:250',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->position = '';
        $this->name = '';
        $this->title = '';
        $this->slug = '';
        $this->description = '';
    }
    //page store method
    public function storePage() {
        //form validation
        $this->validate([
            'position'=>'required|numeric',
            'name'=>'required|min:3|max:255',
            'title'=>'required|min:3|max:255',
            'slug'=>'required|unique:pages',
            'description'=>'required|min:250',
        ]);
        //page store database
        $page = new Page();
        $page->position = $this->position;
        $page->name = $this->name;
        $page->title = $this->title;
        $page->slug = $this->slug;
        $page->description = $this->description;
        $page->save();
        $this->resetForm();
        toastr()->success('Page Created!');
    }
    //render method
    public function render()
    {
        //view of add pages component
        return view('livewire.admin.admin-add-pages-component')->layout('layouts.master');
    }
}
