<?php

namespace App\Http\Livewire\User;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class UserProductRatingsComponent extends Component
{
    //laravel pagination
    use WithPagination;
    //render method
    public function render()
    {
        //customer product ratings fetch
        $productRatings = Review::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        //view customer product ratings component
        return view('livewire.user.user-product-ratings-component',['productRatings'=>$productRatings])->layout('layouts.master');
    }
}
