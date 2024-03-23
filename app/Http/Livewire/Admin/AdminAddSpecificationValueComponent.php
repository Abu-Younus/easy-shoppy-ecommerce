<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\SpecificationValue;
use Livewire\Component;

class AdminAddSpecificationValueComponent extends Component
{
    //product slug variable to single product fetch
    public $product_slug;
    //product specification value store form all variables
    public $spec;
    public $inputs = [];
    public $specification_arr = [];
    public $specification_values;
    //product slug get to mount function
    public function mount($product_slug) {
        $this->product_slug = $product_slug;
    }
    //product specification add method
    public function add() {
        if(!in_array($this->spec,$this->specification_arr)) {
            array_push($this->inputs,$this->spec);
            array_push($this->specification_arr,$this->spec);
        }
    }
    //product specification remove method
    public function remove($spec) {
        unset($this->inputs[$spec]);
    }
    //form validation updated method
    public function updated($fields) {
        if($this->spec == null) {
            $this->validateOnly($fields,[
                'spec'=>'required'
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->spec = '';
        $this->inputs = [];
        $this->specification_arr = [];
        $this->specification_values = '';
    }
    //product specification value store method
    public function storeSpecificationValue() {
        //form validation
        if($this->spec == null) {
            $this->validate([
                'spec'=>'required'
            ]);
        }
        //single product fetch to product slug
        $product = Product::where('slug',$this->product_slug)->first();
        //product specification value store database
        foreach($this->specification_values as $key=>$specification_value) {
            $spec_value = new SpecificationValue();
            $spec_value->product_specification_id = $key;
            $spec_value->value = $specification_value;
            $spec_value->product_id = $product->id;
            $spec_value->save();
        }
        $product->is_specification = 1;
        $product->save();
        $this->resetForm();
        toastr()->success('Added successfully!');
    }
    //render method
    public function render()
    {
        //all product specifications fetch
        $p_specifications = ProductSpecification::all();
        //view of add specification value component
        return view('livewire.admin.admin-add-specification-value-component',['p_specifications'=>$p_specifications])->layout('layouts.master');
    }
}
