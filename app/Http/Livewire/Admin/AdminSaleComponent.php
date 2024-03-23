<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    //sale setting update form variable
    public $sale_date;
    public $status;
    //mount function of sale setting data retrive with database
    public function mount() {
        $sale = Sale::find(1);
        //sale setting non null check to sale data retrive
        if($sale != null) {
            $this->sale_date = $sale->sale_date;
            $this->status = $sale->status;
        }
    }
    //sale setting update method
    public function updateSale() {
        $sale = Sale::find(1);
        //sale setting null check to new sale setting store with database
        if(!$sale) {
            $sale = new Sale();
        }
        $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        toastr()->success('Updated successfully!');
    }
    //render method
    public function render()
    {
        //view of sale component
        return view('livewire.admin.admin-sale-component')->layout('layouts.master');
    }
}
