<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminAddBrandComponent extends Component
{
    //laravel fileuploads use
    use WithFileUploads;
    //brand store form all variables
    public $name;
    public $slug;
    public $image;
    //generate slug to brand name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required|unique:brands'
        ]);

        if($this->image) {
            $this->validateOnly($fields,[
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
        $this->slug = '';
        $this->image = null;
    }
    //brand store method
    public function storeBrand() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'slug'=>'required|unique:brands'
        ]);

        if($this->image) {
            $this->validate([
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //brand store database
        $brand = new Brand();
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        //brand image check
        if($this->image) {
            $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
            Image::make($this->image)->resize(320, 240)->save('assets/images/brands/'.$imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        $this->resetForm();
        toastr()->success('Brand has been created!');
    }
    //render method
    public function render()
    {
        //view of add brand component
        return view('livewire.admin.admin-add-brand-component')->layout('layouts.master');
    }
}
