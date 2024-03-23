<?php

namespace App\Http\Livewire\Admin;

use App\Models\Warehouse;
use Livewire\Component;

class AdminWarehousesComponent extends Component
{
    //warehouse delete method
    public function deleteWarehouse($id) {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        toastr()->success('Warehouse deleted successfully!');
    }
    //render method
    public function render()
    {
        //all warehouses fetch
        $warehouses = Warehouse::orderBy('id','DESC')->paginate(10);
        //view of warehouses component
        return view('livewire.admin.admin-warehouses-component',['warehouses'=>$warehouses])->layout('layouts.master');
    }
}
