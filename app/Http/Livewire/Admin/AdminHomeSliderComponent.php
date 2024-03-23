<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    //home slider delete method
    public function deleteSlide($slide_id) {
        $slide = HomeSlider::find($slide_id);
        unlink('assets/images/sliders'. '/' .$slide->image);
        $slide->delete();
        toastr()->success('Deleted successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //all sliders fetch
        $sliders = HomeSlider::all();
        //view of home slider component
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.master');
    }
}
