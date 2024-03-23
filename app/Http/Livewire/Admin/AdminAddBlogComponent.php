<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Image;

class AdminAddBlogComponent extends Component
{
    //laravel fileuploads use
    use WithFileUploads;
    //blog store form all variables
    public $blog_category_id;
    public $title;
    public $slug;
    public $description;
    public $tags;
    public $image;
    public $status;
    public $published_date;
    public $schedule_datetime;
    //status initialize to mount function
    public function mount() {
        $this->status = 1;
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
            'slug'=>'required|unique:blogs',
            'description'=>'required|min:10|max:500',
            'tags'=>'required|max:255',
            'status'=>'required',
            'published_date'=>'required',
        ]);

        if($this->image) {
            $this->validateOnly($fields,[
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        if($this->published_date == 'schedule') {
            $this->validateOnly($fields,[
                'schedule_datetime'=>'required',
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->blog_category_id = null;
        $this->title = '';
        $this->slug = '';
        $this->description = '';
        $this->image = null;
        $this->tags = '';
        $this->status = '';
        $this->published_date = '';
        $this->schedule_datetime = '';
    }
    //blog store method
    public function storeBlog() {
        //form validation
        $this->validate([
            'blog_category_id'=>'required',
            'title'=>'required|min:3|max:255',
            'slug'=>'required|unique:blogs',
            'description'=>'required|min:10|max:500',
            'tags'=>'required|max:255',
            'status'=>'required',
            'published_date'=>'required',
        ]);

        if($this->image) {
            $this->validate([
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }

        if($this->published_date == 'schedule') {
            $this->validate([
                'schedule_datetime'=>'required',
            ]);
        }
        //blog store database
        $blog = new Blog();
        $blog->blog_category_id = $this->blog_category_id;
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        $blog->description = $this->description;
        $blog->tags = $this->tags;
        //blog published date check current or schedule
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
        if($this->image) {
            $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
            Image::make($this->image)->resize(600, 600)->save('assets/images/blogs/'.$imageName);
            $blog->image = $imageName;
        }
        $blog->status = $this->status;
        $blog->save();
        $this->resetForm();
        toastr()->success('Blog has been posted!');
    }
    //render method
    public function render()
    {
        //all blog categories fetch
        $blogCategories = BlogCategory::where('status',1)->get();
        //view of add blog component
        return view('livewire.admin.admin-add-blog-component',['blogCategories'=>$blogCategories])->layout('layouts.master');
    }
}
