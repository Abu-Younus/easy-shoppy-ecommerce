<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AdminAddHomeSliderComponent extends Component
{
    //laravel fileuploads use
    use WithFileUploads;
    //home slider store all variables
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    //home slider status initialize to mount function
    public function mount() {
        $this->status = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'title'=>'required|min:5|max:255',
            'subtitle'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'link'=>'required',
            'status'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->title = '';
        $this->subtitle = '';
        $this->price = '';
        $this->link = '';
        $this->status = 0;
        $this->image = null;
    }
    //home slider store method
    public function addSlide() {
        //form validation
        $this->validate([
            'title'=>'required|min:5|max:255',
            'subtitle'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'link'=>'required',
            'status'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);
        //home slider store database
        $slide = new HomeSlider();
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        Image::make($this->image)->resize(600,600)->save('assets/images/sliders/'.$imageName);
        $slide->image = $imageName;
        $slide->status = $this->status;
        $slide->save();
        $this->resetForm();
        toastr()->success('Created successfully!');
    }
    //render method
    public function render()
    {
        //view of add home slider component
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.master');
    }
}
