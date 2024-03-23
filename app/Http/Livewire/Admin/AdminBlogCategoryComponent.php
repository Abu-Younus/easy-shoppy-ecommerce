<?php

namespace App\Http\Livewire\Admin;

use App\Models\BlogCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBlogCategoryComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //blog category delete method
    public function deleteBlogCategory($id) {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();

        toastr()->success('Blog Category delete successfully!');
    }
    //render method
    public function render()
    {
        //all blog categories fetch
        $blogCategories = BlogCategory::orderBy('id','DESC')->paginate(5);
        //view of blog category component
        return view('livewire.admin.admin-blog-category-component',['blogCategories'=>$blogCategories])->layout('layouts.master');
    }
}
