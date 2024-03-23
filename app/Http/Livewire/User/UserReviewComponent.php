<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use Image;

class UserReviewComponent extends Component
{
    //laravel file uploads
    use WithFileUploads;
    //orderitem id variable
    public $order_item_id;
    //customer product reviews variable
    public $rating;
    public $comment;
    public $images;
    public $newimages;
    //orderitem id fetch to mount method
    public function mount($order_item_id) {
        $this->order_item_id = $order_item_id;
        $orderItem = OrderItem::find($order_item_id);
        //customer exist product review check
        $existingReview = Review::where('user_id',Auth::user()->id)->where('product_id',$orderItem->product_id)->first();
        if($existingReview) {
            $this->rating = $existingReview->rating;
            $this->comment = $existingReview->comment;
            $this->images = explode(",",$existingReview->images);
        }
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'rating'=>'required',
            'comment'=>'required|min:5|max:500'
        ]);

        if($this->images) {
            $this->validateOnly($fields,[
                'images'=>'required'
            ]);
        }

        if($this->newimages) {
            $this->validate([
                'newimages'=>'required'
            ]);
        }
    }
    //product review add method
    public function addReview() {
        //form validation
        $this->validate([
            'rating'=>'required',
            'comment'=>'required|min:5|max:500'
        ]);

        //orderItem product fetch
        $orderItem = OrderItem::find($this->order_item_id);
        //customer existing review fetch
        $existingReview = Review::where('user_id',Auth::user()->id)->where('product_id',$orderItem->product_id)->first();
        //customer product review check to review update
        if($existingReview) {
            if($this->newimages) {
                $this->validate([
                    'newimages'=>'required'
                ]);
            }

            $existingReview->rating = $this->rating;
            $existingReview->comment = $this->comment;
            if($this->newimages) {
                if($existingReview->images) {
                    $images = explode(",",$existingReview->images);
                    foreach($images as $image) {
                        if($image) {
                            unlink('assets/images/review-images'. '/' .$image);
                        }
                    }
                }
                $imagesName = '';
                foreach($this->newimages as $key=>$newimage) {
                    $imgName = Carbon::now()->timestamp. $key. '.' .$newimage->extension();
                    Image::make($newimage)->resize(200, 200)->save('assets/images/review-images/'.$imgName);
                    $imagesName = $imagesName. ',' .$imgName;
                }
                $existingReview->images = $imagesName;
            }
            $existingReview->save();

            toastr()->success('Updated successfully!', 'Congrats');
        }
        //customer product review store database
        else {

            if($this->images) {
                $this->validate([
                    'images'=>'required'
                ]);
            }

            $orderItem = OrderItem::find($this->order_item_id);

            $review = new Review();
            $review->rating = $this->rating;
            $review->comment = $this->comment;
            $review->order_item_id = $this->order_item_id;
            $review->product_id = $orderItem->product_id;
            $review->user_id = Auth::user()->id;
            if($this->images) {
                $imagesName = '';
                foreach($this->images as $key=>$image) {
                    $imgName = Carbon::now()->timestamp. $key. '.' .$image->extension();
                    Image::make($image)->resize(200, 200)->save('assets/images/review-images/'.$imgName);
                    $imagesName = $imagesName. ',' .$imgName;
                }
                $review->images = $imagesName;
            }
            $review->save();

            $orderItem->rstatus = true;
            $orderItem->save();

            toastr()->success('Added successfully!', 'Congrats');
        }
    }
    //render method
    public function render()
    {
        //orderItem product fetch
        $orderItem = OrderItem::find($this->order_item_id);
        //customer product review fetch
        $review = Review::where('user_id',Auth::user()->id)->where('product_id',$orderItem->product_id)->first();
        //view customer review component
        return view('livewire.user.user-review-component',['orderItem'=>$orderItem,'review'=>$review])->layout('layouts.master');
    }
}
