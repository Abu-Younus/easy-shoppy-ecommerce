<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductSpecification;
use Livewire\Component;

class AdminProductSpecificationsComponent extends Component
{
    //product specification delete method
    public function deleteSpecification($specification_id) {
        $p_specification = ProductSpecification::find($specification_id);
        $p_specification->delete();
        toastr()->success('Deleted successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //product specifications fetch
        $p_specifications = ProductSpecification::paginate(10);
        //view of product specifications component
        return view('livewire.admin.admin-product-specifications-component',['p_specifications'=>$p_specifications])->layout('layouts.master');
    }
}
