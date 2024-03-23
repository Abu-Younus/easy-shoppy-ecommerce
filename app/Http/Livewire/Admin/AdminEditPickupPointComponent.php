<?php

namespace App\Http\Livewire\Admin;

use App\Models\PickupPoint;
use Livewire\Component;

class AdminEditPickupPointComponent extends Component
{
    //pickup point update form all variables
    public $name;
    public $address;
    public $phone;
    public $phone2;
    public $p_point_id;
    //mount function of pickup point id to retrive pickup point data with database
    public function mount($p_point_id) {
        $this->p_point_id = $p_point_id;
        $p_point = PickupPoint::find($p_point_id);
        $this->name = $p_point->name;
        $this->address = $p_point->address;
        $this->phone = $p_point->phone;
        $this->phone2 = $p_point->phone2;
        $this->p_point_id = $p_point->id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:255',
            'address'=>'required|min:5|max:500',
            'phone'=>'required|numeric',
        ]);
        if($this->phone2) {
            $this->validateOnly($fields,[
                'phone2'=>'required|numeric',
            ]);
        }
    }
    //pickup point update method
    public function updatePickupPoint() {
        $this->validate([
            'name'=>'required|min:3|max:255',
            'address'=>'required|min:5|max:500',
            'phone'=>'required|numeric',
        ]);

        if($this->phone2) {
            $this->validate([
                'phone2'=>'required|numeric',
            ]);
        }
        //pickup point update data store database
        $p_point = PickupPoint::find($this->p_point_id);
        $p_point->name = $this->name;
        $p_point->address = $this->address;
        $p_point->phone = $this->phone;
        $p_point->phone2 = $this->phone2;
        $p_point->save();

        toastr()->success('Pickup Point updated successfully!');
    }
    //render method
    public function render()
    {
        //view of edit pickup point component
        return view('livewire.admin.admin-edit-pickup-point-component')->layout('layouts.master');
    }
}
