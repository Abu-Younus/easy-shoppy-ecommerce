<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBlogsComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //blog delete method
    public function deleteBlog($id) {
        $blog = Blog::find($id);
        //image check to blog delete
        if($blog->image) {
            unlink('assets/images/blogs'. '/' .$blog->image);
        }
        $blog->delete();

        toastr()->success('Blog deleted successfully!');
    }
    //render method
    public function render()
    {
        //all blogs fetch
        $blogs = Blog::orderBy('id','DESC')->paginate(12);
        //view of blogs component
        return view('livewire.admin.admin-blogs-component',['blogs'=>$blogs])->layout('layouts.master');
    }
}
