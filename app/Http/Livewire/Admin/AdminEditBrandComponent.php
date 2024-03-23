<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminEditBrandComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //brand update form all variables
    public $brand_slug;
    public $name;
    public $slug;
    public $brand_id;
    public $image;
    public $newimage;
    //mount function of brand slug to retrive brand data with database
    public function mount($brand_slug) {
        $this->brand_slug = $brand_slug;
        $brand = Brand::where('slug',$brand_slug)->first();
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->image = $brand->image;
        $this->brand_id = $brand->id;
    }
    //generate slug to brand name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required'
        ]);
        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //brand update method
    public function updateBrand() {
        $this->validate([
            'name'=>'required|min:3|max:255',
            'slug'=>'required'
        ]);
        if($this->newimage) {
            $this->validate([
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //brand update data store database
        $brand = Brand::find($this->brand_id);
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        //brand image check
        if($this->newimage) {
            if($brand->image) {
                unlink('assets/images/brands'. '/' .$brand->image);
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            Image::make($this->newimage)->resize(320, 240)->save('assets/images/brands/'.$imageName);
            $brand->image = $imageName;
        }
        $brand->save();

        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //view of edit brand component
        return view('livewire.admin.admin-edit-brand-component')->layout('layouts.master');
    }
}
