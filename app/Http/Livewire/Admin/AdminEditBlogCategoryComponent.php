<?php

namespace App\Http\Livewire\Admin;

use App\Models\BlogCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditBlogCategoryComponent extends Component
{
    //blog category update form all variables
    public $blog_category_slug;
    public $name;
    public $slug;
    public $blog_category_id;
    //mount function of blog category slug to retrive blog category data with database
    public function mount($blog_category_slug) {
        $this->blog_category_slug = $blog_category_slug;
        $blogCategory = BlogCategory::where('slug',$this->blog_category_slug)->first();
        $this->name = $blogCategory->name;
        $this->slug = $blogCategory->slug;
        $this->blog_category_id = $blogCategory->id;
    }
    //generate slug to blog category name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required',
        ]);
    }
    //blog category update method
    public function updateBlogCategory() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'slug'=>'required',
        ]);
        //blog category update data store database
        $blogCategory = BlogCategory::find($this->blog_category_id);
        $blogCategory->name = $this->name;
        $blogCategory->slug = $this->slug;
        $blogCategory->save();

        toastr()->success('Blog Category Updated!');
    }
    //render method
    public function render()
    {
        //view of edit blog category component
        return view('livewire.admin.admin-edit-blog-category-component')->layout('layouts.master');
    }
}
