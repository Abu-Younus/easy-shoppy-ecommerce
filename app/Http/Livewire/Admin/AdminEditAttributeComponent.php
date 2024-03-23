<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminEditAttributeComponent extends Component
{
    //attribute edit form variable
    public $attribute_id;
    public $name;
    //mount function of attribute id to retrive attribute data with database
    public function mount($attribute_id) {
        $pattribute = ProductAttribute::find($this->attribute_id);
        $this->attribute_id = $attribute_id;
        $this->name = $pattribute->name;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields, [
            'name'=>'required|min:3|max:25'
        ]);
    }
    //attribute update method
    public function updateAttribute() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:25'
        ]);
        //attribute update store database
        $pattribute = ProductAttribute::find($this->attribute_id);
        $pattribute->name = $this->name;
        $pattribute->save();

        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //view of edit attribute component
        return view('livewire.admin.admin-edit-attribute-component')->layout('layouts.master');
    }
}
