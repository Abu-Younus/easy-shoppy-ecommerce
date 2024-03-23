<?php

namespace App\Http\Livewire\Admin;

use App\Models\PickupPoint;
use Livewire\Component;

class AdminAddPickupPointComponent extends Component
{
    //pickup point store all variables
    public $name;
    public $address;
    public $phone;
    public $phone2;
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
    //form reset method
    protected function resetForm() {
        $this->name = '';
        $this->address = '';
        $this->phone = '';
        $this->phone2 = '';
    }
    //pickup point store method
    public function storePickupPoint() {
        //form validation
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
        //pickup point store database
        $p_point = new PickupPoint();
        $p_point->name = $this->name;
        $p_point->address = $this->address;
        $p_point->phone = $this->phone;
        $p_point->phone2 = $this->phone2;
        $p_point->save();
        $this->resetForm();
        toastr()->success('Pickup Point added successfully!');
    }
    //render method
    public function render()
    {
        //view of pickup point component
        return view('livewire.admin.admin-add-pickup-point-component')->layout('layouts.master');
    }
}
