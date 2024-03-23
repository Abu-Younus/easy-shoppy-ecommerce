<?php

namespace App\Http\Livewire\Admin;

use App\Models\Warehouse;
use Livewire\Component;

class AdminEditWarehouseComponent extends Component
{
    //warehouse update form all variables
    public $name;
    public $address;
    public $phone;
    public $warehouse_id;
    //mount function of warehouse id to retrive warehouse data with database
    public function mount($warehouse_id) {
        $this->warehouse_id = $warehouse_id;
        $warehouse = Warehouse::find($warehouse_id);
        $this->name = $warehouse->name;
        $this->address = $warehouse->address;
        $this->phone = $warehouse->phone;
        $this->warehouse_id = $warehouse->id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'address'=>'required|min:5|max:500',
            'phone'=>'required|numeric',
        ]);
    }
    //warehouse update method
    public function updateWarehouse() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'address'=>'required|min:5|max:500',
            'phone'=>'required|numeric',
        ]);
        //warehouse update data store to database
        $warehouse = Warehouse::find($this->warehouse_id);
        $warehouse->name = $this->name;
        $warehouse->address = $this->address;
        $warehouse->phone = $this->phone;
        $warehouse->save();

        toastr()->success('Warehouse updated successfully!');
    }
    //render method
    public function render()
    {
        //view of edit warehouse component
        return view('livewire.admin.admin-edit-warehouse-component')->layout('layouts.master');
    }
}
