<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoriesComponent extends Component
{
    //home categories update form variables
    public $select_categories = [];
    public $numberofproducts;
    //mount function to home category fetch
    public function mount() {
        $category = HomeCategory::find(1);
        //category null check to home category add
        if($category != null) {
            $this->select_categories = explode(",",$category->sel_categories);
            $this->numberofproducts = $category->no_of_products;
        }
    }
    //home category update method
    public function updateHomeCategory() {
        //home category fetch to update home category
        $category = HomeCategory::find(1);
        //category null check to home category store to database
        if(!$category) {
            $category = new HomeCategory();
        }
        //home category update data store to database
        $category->sel_categories = implode(",",$this->select_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();
        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //all categories fetch
        $categories = Category::where('active_status',1)->get();
        //view of home categories component
        return view('livewire.admin.admin-home-categories-component',['categories'=>$categories])->layout('layouts.master');
    }
}
