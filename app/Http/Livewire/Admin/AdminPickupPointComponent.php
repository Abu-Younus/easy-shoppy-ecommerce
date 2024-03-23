<?php

namespace App\Http\Livewire\Admin;

use App\Models\PickupPoint;
use Livewire\Component;

class AdminPickupPointComponent extends Component
{
    //pickup point delete method
    public function deletePickupPoint($id) {
        $p_point = PickupPoint::find($id);
        $p_point->delete();
        toastr()->success('Pickup Point deleted successfully!');
    }
    //render method
    public function render()
    {
        //all pickup points fetch
        $p_points = PickupPoint::orderBy('id','DESC')->paginate(10);
        //view of pickup point component
        return view('livewire.admin.admin-pickup-point-component',['p_points'=>$p_points])->layout('layouts.master');
    }
}
