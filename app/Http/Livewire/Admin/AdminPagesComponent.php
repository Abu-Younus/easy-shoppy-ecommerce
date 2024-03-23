<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;

class AdminPagesComponent extends Component
{
    //page delete method
    public function deletepage($id) {
        $page = Page::find($id);
        $page->delete();
        toastr()->success('Page deleted successfully!');
    }
    //render method
    public function render()
    {
        //all pages fetch
        $pages = Page::orderBy('id','DESC')->paginate(5);
        //view of pages component
        return view('livewire.admin.admin-pages-component',['pages'=>$pages])->layout('layouts.master');
    }
}
