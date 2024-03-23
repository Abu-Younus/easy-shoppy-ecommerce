<?php

namespace App\Http\Livewire\User;

use App\Models\WebsiteReview;
use Carbon\Carbon;
use Livewire\Component;
use Auth;

class UserWebsiteReviewComponent extends Component
{
    //customer website review variable
    public $review;
    public $rating;
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'review'=>'required|min:5|max:500',
            'rating'=>'required',
        ]);
    }
    //customer website review store method
    public function storeReview() {
        $this->validate([
            'review'=>'required|min:5|max:500',
            'rating'=>'required',
        ]);
        //customer existing website review check
        $reviewCheck = WebsiteReview::where('user_id',Auth::user()->id)->first();

        if($reviewCheck) {
            toastr()->error('Review already exist!');
        }
        //customer website review store database field
        else {
            $review = new WebsiteReview();
            $review->user_id = Auth::user()->id;
            $review->review = $this->review;
            $review->rating = $this->rating;
            $review->review_date = date('d F, Y');
            $review->review_time = Carbon::now();
            $review->save();

            toastr()->success('Review added successfully!');
        }
    }
    //render method
    public function render()
    {
        //view customer website review component
        return view('livewire.user.user-website-review-component')->layout('layouts.master');
    }
}
