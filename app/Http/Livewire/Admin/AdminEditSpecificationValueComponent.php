<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\SpecificationValue;
use Livewire\Component;

class AdminEditSpecificationValueComponent extends Component
{
    //specification value update form all variables
    public $product_slug;
    public $product_id;
    public $spec;
    public $inputs = [];
    public $specification_arr = [];
    public $specification_values;
    //mount function of product slug to retrive specification value with database
    public function mount($product_slug) {
        $this->product_slug = $product_slug;
        $product = Product::where('slug',$product_slug)->first();
        $this->product_id = $product->id;
        $this->inputs = $product->SpecificationValues->where('product_id',$product->id)->unique('product_specification_id')->pluck('product_specification_id');
        $this->specification_arr = $product->SpecificationValues->where('product_id',$product->id)->unique('product_specification_id')->pluck('product_specification_id');
        //specification value check
        foreach($this->specification_arr as $spec_arr) {
            $allSpecificationValue = SpecificationValue::where('product_id',$product->id)->where('product_specification_id',$spec_arr)->get()->pluck('value');
            $valueString = '';
            foreach($allSpecificationValue as $value) {
                $valueString = $valueString .$value;
            }
            $this->specification_values[$spec_arr] = $valueString;
        }
    }
    //specification value add method
    public function add() {
        if(!$this->specification_arr->contains($this->spec)) {
            $this->inputs->push($this->spec);
            $this->specification_arr->push($this->spec);
        }
    }
    //specification value remove method
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
    //specification value update method
    public function updateSpecificationValue() {
        //form validation
        if($this->spec == null) {
            $this->validate([
                'spec'=>'required'
            ]);
        }
        //specification value fetch
        SpecificationValue::where('product_id',$this->product_id)->delete();
        if($this->specification_values) {
            foreach($this->specification_values as $key=>$specification_value) {
                //specification value update data store database
                $spec_value = new SpecificationValue();
                $spec_value->product_specification_id = $key;
                $spec_value->value = $specification_value;
                $spec_value->product_id = $this->product_id;
                $spec_value->save();
            }
        }
        toastr()->success('Updated successfully!');
    }
    //render method
    public function render()
    {
        //product specification fetch
        $p_specifications = ProductSpecification::all();
        //view of edit specification component
        return view('livewire.admin.admin-edit-specification-value-component',['p_specifications'=>$p_specifications])->layout('layouts.master');
    }
}
