<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Product;
use App\Models\campaignProduct;
use App\Models\Review;
use App\Models\OrderItem;
use App\Models\ProductQuestion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Cart;
use Auth;
use Image;

class ProductDetailsComponent extends Component
{
    //use laravel file uploads
    use WithFileUploads;
    //variable for product slug
    public $slug;
    //campaign slug & campaign product id variable
    public $campaign_slug;
    public $campaign_product_id;
    //variable for product qty increase and decrease
    public $qty;
    //variable for product attribute array
    public $selected_attr = [];
    //varaible for product reviews and questions
    public $review;
    public $rating;
    public $images;
    public $question;
    //mount function for product slug and qty initialize
    public function mount($slug,$campaign_slug=null,$campaign_product_id=null) {
        $this->slug = $slug;
        $this->qty = 1;
        if($campaign_slug && $campaign_product_id) {
            $this->campaign_slug = $campaign_slug;
            $this->campaign_product_id = $campaign_product_id;
        }
    }
    //cart product store method
    public function store($product_id, $product_name, $product_price) {
        if(Cart::instance('cart')->content()->pluck('id')->contains($product_id) == $product_id) {
            toastr()->error('Item is already added to cart!');
        }
        else {
            Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->selected_attr)->associate('App\Models\Product');
            $this->emitTo('front-end.cart-count-component','refreshComponent');
            toastr()->success('Item is added to cart!');
        }
    }
    //increase product qty method
    public function increaseQuantity() {
       $this->qty++;
    }
    //decrease product qty method
    public function decreaseQuantity() {
       if($this->qty > 1) {
        $this->qty--;
       }
    }
    //Add to Wishlist Product Method
    public function addToWishlist($product_id, $product_name, $product_price) {
        if(Auth::check()) {
            Cart::instance('wishlist')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
            $this->emitTo('front-end.wishlist-count-component','refreshComponent');
            toastr()->success('Item is added to wishlist!');
        }
        else {
            toastr()->error('Please first login in your account, then item added to wishlist!');
        }
    }
    //Removed for Wishlist Product Method
    public function removeFromWishlist($product_id) {
        if(Auth::check()) {
            foreach(Cart::instance('wishlist')->content() as $wishlist_item) {
                if($wishlist_item->id == $product_id) {
                    Cart::instance('wishlist')->remove($wishlist_item->rowId);
                    $this->emitTo('front-end.wishlist-count-component','refreshComponent');
                    toastr()->success('Item is removed for wishlist!');
                    return;
                }
            }
        }
        else {
            toastr()->error('Please first login in your account, then item removed for wishlist!');
        }
    }
    //form validation with product reviews and questions updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'review'=>'required|min:5|max:500',
            'rating'=>'required',
            'question'=>'required|min:5|max:500',
        ]);

        if($this->images) {
            $this->validateOnly($fields,[
                'images'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //review store method
    public function storeReview() {
        $product = Product::where('slug', $this->slug)->first();
        $orderItem = OrderItem::where('user_id',Auth::user()->id)->where('product_id',$product->id)->first();
        $existingReview = Review::where('user_id',Auth::user()->id)->where('product_id',$product->id)->first();
        //form validation with product reviews
        $this->validate([
            'review'=>'required|min:5|max:500',
            'rating'=>'required',
        ]);

        if($this->images) {
            $this->validate([
                'images'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //checking the current customers product order first, then review added
        if($orderItem) {
            //current customer existing product review check
            if($existingReview) {
                Toastr()->error('Your review is already added!');
            } else {
                //review store database
                $review = new Review();
                $review->rating = $this->rating;
                $review->comment = $this->review;
                $review->order_item_id = $orderItem->id;
                $review->product_id = $product->id;
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
            }
        } else {
            Toastr()->error('Please, product is order first. then, your review added!');
        }
    }
    //question store method
    public function storeQuestion() {
        //form validation for questions
        $this->validate([
            'question'=>'required|min:5|max:500',
        ]);
        //customer auth check to product question add
        if(Auth::user()->utype == 'USR') {
            //question store for database
            $product = Product::where('slug', $this->slug)->first();
            $question = new ProductQuestion();
            $question->user_id = Auth::user()->id;
            $question->product_id = $product->id;
            $question->question = $this->question;
            $question->is_reply = false;
            $question->date = Carbon::now()->format('Y-m-d');
            $question->save();
            toastr()->success('Added successfully!');
        }
        else {
            toastr()->error('Only customer is added to product question!');
        }
    }
    //render method
    public function render()
    {
        //Product fetch
        $product = Product::where('slug', $this->slug)->first();
        //campaign fetch
        $campaignProduct = CampaignProduct::where('id',$this->campaign_product_id)->first();
        //popular products fetch
        $popular_products = Product::orderBy('product_views','DESC')->limit(4)->get();
        //category related products fetch
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(8)->get();
        //product views count
        Product::where('slug',$this->slug)->increment('product_views');
        //Recently Viewed Products Count
        session()->put(['product_id'=>$product->id]);
        //wishlist items id check for remove
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
        //Reviews Count
        $review_5=Review::where('product_id',$product->id)->where('rating',5)->count();
        $review_4=Review::where('product_id',$product->id)->where('rating',4)->count();
        $review_3=Review::where('product_id',$product->id)->where('rating',3)->count();
        $review_2=Review::where('product_id',$product->id)->where('rating',2)->count();
        $review_1=Review::where('product_id',$product->id)->where('rating',1)->count();
        $sum_rating=Review::where('product_id',$product->id)->sum('rating');
        $count_rating=Review::where('product_id',$product->id)->count('rating');
        //Questions list fetch
        $questions = ProductQuestion::where('product_id',$product->id)->orderBy('id','DESC')->get();
        //Auth check with cart and wishlist store
        if(Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        //view product details component
        return view('livewire.front-end.product-details-component',[
            'product'=>$product,
            'campaignProduct'=>$campaignProduct,
            'popular_products'=>$popular_products,
            'related_products'=>$related_products,
            'wishlist_items'=>$wishlist_items,
            'review_5'=>$review_5,
            'review_4'=>$review_4,
            'review_3'=>$review_3,
            'review_2'=>$review_2,
            'review_1'=>$review_1,
            'sum_rating'=>$sum_rating,
            'count_rating'=>$count_rating,
            'questions'=>$questions
            ])->layout('layouts.master');
    }
}
