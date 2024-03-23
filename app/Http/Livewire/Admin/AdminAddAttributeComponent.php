<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttributeComponent extends Component
{
    //attribute name variable
    public $name;
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields, [
            'name'=>'required|min:3|max:25'
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
    }
    //attribute store method
    public function storeAttribute() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:25'
        ]);
        $pattribute = new ProductAttribute();
        $pattribute->name = $this->name;
        $pattribute->save();
        $this->resetForm();
        toastr()->success('Created successfully!');
    }
    //render method
    public function render()
    {
        //view of add attribute component
        return view('livewire.admin.admin-add-attribute-component')->layout('layouts.master');
    }
}
