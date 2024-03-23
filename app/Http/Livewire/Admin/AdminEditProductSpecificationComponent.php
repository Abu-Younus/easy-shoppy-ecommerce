<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductSpecification;
use Livewire\Component;

class AdminEditProductSpecificationComponent extends Component
{
    //product specification update form variables
    public $name;
    public $specification_id;
    //mount function of specification id to retrive product specification data with database
    public function mount($specification_id) {
        $this->specification_id = $specification_id;
        $p_specification = ProductSpecification::find($specification_id);
        $this->name = $p_specification->name;
        $this->specification_id = $p_specification->id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255'
        ]);
    }
    //product specification update method
    public function updateSpecification() {
        $this->validate([
            'name'=>'required|min:3|max:255'
        ]);
        //product specification update data store database
        $p_specification = ProductSpecification::find($this->specification_id);
        $p_specification->name = $this->name;
        $p_specification->save();
        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //view of edit product specification component
        return view('livewire.admin.admin-edit-product-specification-component')->layout('layouts.master');
    }
}
