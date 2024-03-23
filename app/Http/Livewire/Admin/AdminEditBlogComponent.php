<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Image;

class AdminEditBlogComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //blog updated form all variables
    public $blog_slug;
    public $blog_id;
    public $blog_category_id;
    public $title;
    public $slug;
    public $description;
    public $tags;
    public $image;
    public $newimage;
    public $status;
    public $published_date;
    public $schedule_datetime;
    //mount function of blog slug to retrive blog data with databse
    public function mount($blog_slug) {
        $this->blog_slug = $blog_slug;
        $blog = Blog::where('slug',$this->blog_slug)->first();
        $this->blog_category_id = $blog->blog_category_id;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->description = $blog->description;
        $this->tags = $blog->tags;
        $this->image = $blog->image;
        $this->status = $blog->status;
        $this->blog_id = $blog->id;
    }
    //generate slug to blog title
    public function generateSlug() {
        $this->slug = Str::slug($this->title);
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'blog_category_id'=>'required',
            'title'=>'required|min:3|max:255',
            'slug'=>'required',
            'description'=>'required|min:10|max:500',
            'tags'=>'required|max:255',
            'status'=>'required',
            'published_date'=>'required',
        ]);

        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        if($this->published_date == 'schedule') {
            $this->validateOnly($fields,[
                'schedule_datetime'=>'required',
            ]);
        }
    }
    //blog update method
    public function updateBlog() {
        //form validation
        $this->validate([
            'blog_category_id'=>'required',
            'title'=>'required|min:3|max:255',
            'slug'=>'required',
            'description'=>'required|min:10|max:500',
            'tags'=>'required|max:255',
            'status'=>'required',
            'published_date'=>'required',
        ]);

        if($this->newimage) {
            $this->validate([
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($this->published_date == 'schedule') {
            $this->validate([
                'schedule_datetime'=>'required',
            ]);
        }
        //blog update data store database
        $blog = Blog::find($this->blog_id);
        $blog->blog_category_id = $this->blog_category_id;
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        $blog->description = $this->description;
        $blog->tags = $this->tags;
        //blog published data check current or schedule
        if($this->published_date == 'current') {
            $blog->published_date = Carbon::now()->format('Y-m-d g:i A');
            $blog->current = true;
            $blog->schedule = false;
        }
        else {
            $blog->published_date = Carbon::parse($this->schedule_datetime)->format('Y-m-d g:i A');
            $blog->schedule = true;
            $blog->current = false;
        }
        //blog image check
        if($this->newimage) {
            if($blog->image) {
                unlink('assets/images/blogs'. '/' .$blog->image);
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            Image::make($this->newimage)->resize(600, 600)->save('assets/images/blogs/'.$imageName);
            $blog->image = $imageName;
        }
        $blog->status = $this->status;
        $blog->save();

        toastr()->success('Blog post has been updated!');
    }
    //render method
    public function render()
    {
        //all blog categories fetch
        $blogCategories = BlogCategory::where('status',1)->get();
        //blog fetch
        $blog = Blog::where('slug',$this->blog_slug)->first();
        //view of edit blog component
        return view('livewire.admin.admin-edit-blog-component',['blogCategories'=>$blogCategories,'blog'=>$blog])->layout('layouts.master');
    }
}
