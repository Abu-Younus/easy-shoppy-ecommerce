<?php

namespace App\Http\Livewire\Admin;

use App\Models\Warehouse;
use Livewire\Component;

class AdminAddWarehouseComponent extends Component
{
    //warehouse store form all variables
    public $name;
    public $address;
    public $phone;
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'address'=>'required|min:5|max:500',
            'phone'=>'required|numeric',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
        $this->address = '';
        $this->phone = '';
    }
    //warehouse store method
    public function storeWarehouse() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'address'=>'required|min:5|max:500',
            'phone'=>'required|numeric',
        ]);
        //warehouse store database
        $warehouse = new Warehouse();
        $warehouse->name = $this->name;
        $warehouse->address = $this->address;
        $warehouse->phone = $this->phone;
        $warehouse->save();
        $this->resetForm();
        toastr()->success('Warehouse added successfully!');
    }
    //render method
    public function render()
    {
        //view of add warehouse component
        return view('livewire.admin.admin-add-warehouse-component')->layout('layouts.master');
    }
}
