<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAttributesComponent extends Component
{
    //product attribute delete method
    public function deleteAttribute($attribute_id) {
        $pattribute = ProductAttribute::find($attribute_id);
        $pattribute->delete();

        toastr()->success('Deleted successfully!', 'Congrats');
    }

    //laravel pagination use
    use WithPagination;
    //render method
    public function render()
    {
        //all product attributes fetch
        $pattributes = ProductAttribute::paginate(10);
        //view of product attributes component
        return view('livewire.admin.admin-attributes-component',['pattributes'=>$pattributes])->layout('layouts.master');
    }
}
