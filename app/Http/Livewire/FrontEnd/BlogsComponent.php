<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Blog;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    //Pagination
    use WithPagination;
    //Render Method
    public function render()
    {
        //All Blogs Fetch
        $blogs = Blog::where('published_date','<=',Carbon::now()->format('Y-m-d g:i A'))->orderBy('id','DESC')->paginate(24);
        //View Blogs Component
        return view('livewire.front-end.blogs-component',['blogs'=>$blogs])->layout('layouts.master');
    }
}
