<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductSpecification;
use Livewire\Component;

class AdminAddProductSpecificationComponent extends Component
{
    //product specification store form variable
    public $name;
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255'
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
    }
    //product specification store method
    public function storeSpecification() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255'
        ]);
        //product specification store database
        $p_specification = new ProductSpecification();
        $p_specification->name = $this->name;
        $p_specification->save();
        $this->resetForm();
        toastr()->success('Added successfully!');
    }
    //render method
    public function render()
    {
        //view of add product specification component
        return view('livewire.admin.admin-add-product-specification-component')->layout('layouts.master');
    }
}
