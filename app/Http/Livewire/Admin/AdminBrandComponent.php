<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBrandComponent extends Component
{
    //brand delete method
    public function deleteBrand($id) {
        $brand = Brand::find($id);
        //brand image check to brand delete
        if($brand->image) {
            unlink('assets/images/brands'. '/' .$brand->image);
        }
        $brand->delete();

        toastr()->success('Brand has been deleted!');
    }
    //laravel pagination use
    use WithPagination;
    //render method
    public function render()
    {
        //all brands fetch
        $brands = Brand::orderBy('id','DESC')->paginate(5);
        //view of brands component
        return view('livewire.admin.admin-brand-component',['brands'=>$brands])->layout('layouts.master');
    }
}
