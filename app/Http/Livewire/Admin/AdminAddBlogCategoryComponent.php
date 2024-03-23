<?php

namespace App\Http\Livewire\Admin;

use App\Models\BlogCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddBlogCategoryComponent extends Component
{
    //blog category name and slug variables
    public $name;
    public $slug;
    //function of generate slug to blog category name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required|unique:blog_categories',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
        $this->slug = '';
    }
    //blog category store method
    public function storeBlogCategory() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'slug'=>'required|unique:blog_categories',
        ]);

        $blogCategory = new BlogCategory();
        $blogCategory->name = $this->name;
        $blogCategory->slug = $this->slug;
        $blogCategory->save();
        $this->resetForm();
        toastr()->success('Blog Category Added!');
    }
    //render method
    public function render()
    {
        //view of add blog category component
        return view('livewire.admin.admin-add-blog-category-component')->layout('layouts.master');
    }
}
