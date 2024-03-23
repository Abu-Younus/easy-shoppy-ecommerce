<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    //variable for category and product name wise product search
    public $search;
    public $product_cat;
    public $product_cat_id;
    //mount function for fetch category and search product name
    public function mount() {
        $this->product_cat = 'All Category';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }
    //render method
    public function render()
    {
        //all categories fetch
        $categories = Category::where('active_status',1)->get();
        //view header search component
        return view('livewire.front-end.header-search-component',['categories'=>$categories]);
    }
}
