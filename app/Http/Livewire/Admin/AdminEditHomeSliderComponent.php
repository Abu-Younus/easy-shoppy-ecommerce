<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AdminEditHomeSliderComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //home slider update form all variables
    public $slider_id;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newimage;
    //mount function of slider id to retrive home slider data with database
    public function mount($slider_id) {
        $slide = HomeSlider::find($slider_id);
        $this->title = $slide->title;
        $this->subtitle = $slide->subtitle;
        $this->price = $slide->price;
        $this->link = $slide->link;
        $this->status = $slide->status;
        $this->image = $slide->image;
        $this->slider_id = $slide->id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'title'=>'required|min:5|max:255',
            'subtitle'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'link'=>'required',
            'status'=>'required',
        ]);

        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //slider update method
    public function updateSlide() {
        $this->validate([
            'title'=>'required|min:5|max:255',
            'subtitle'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'link'=>'required',
            'status'=>'required',
        ]);

        if($this->newimage) {
            $this->validate([
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //home slider update data store database
        $slide = HomeSlider::find($this->slider_id);
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        $slide->status = $this->status;
        //slider image check
        if($this->newimage) {
            if($slide->image) {
                unlink('assets/images/sliders'. '/' .$slide->image);
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            Image::make($this->newimage)->resize(600,600)->save('assets/images/sliders/'.$imageName);
            $slide->image = $imageName;
        }

        $slide->save();
        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //view of edit home slider component
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.master');
    }
}
