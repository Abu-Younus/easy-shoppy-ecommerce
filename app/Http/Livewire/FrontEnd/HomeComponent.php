<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\HomeSlider;
use App\Models\Campaign;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Review;
use App\Models\CampaignProduct;
use App\Models\HomeCategory;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\WebsiteReview;
use Livewire\Component;
use Auth;
use Cart;

class HomeComponent extends Component
{
    //quick view product id variable
    public $quick_view_product_id;
    //variable for product qty increase and decrease
    public $qty;
    //campaign slug & campaign product id variable
    public $campaign_slug;
    public $campaign_product_id;

    //mount function for product slug and qty initialize
    public function mount($campaign_slug=null,$campaign_product_id=null) {
        $this->qty = 1;
        if($campaign_slug && $campaign_product_id) {
            $this->campaign_slug = $campaign_slug;
            $this->campaign_product_id = $campaign_product_id;
        }
    }

    public function getProductID($id) {
        $this->quick_view_product_id = $id;
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

    //Cart Product Store Method
    public function store($product_id, $product_name, $product_price) {
        if(Cart::instance('cart')->content()->pluck('id')->contains($product_id) == $product_id) {
            toastr()->error('Item is already added to cart!');
        }
        else {
            Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
            $this->emitTo('front-end.cart-count-component','refreshComponent');
            toastr()->success('Item is added to cart!');
        }
    }
    //Add To Wishlist Method
    public function addToWishlist($product_id, $product_name, $product_price) {
        if(Auth::check()) {
            if(Cart::instance('wishlist')->content()->pluck('id')->contains($product_id) == $product_id) {
                toastr()->error('Item is already added to wishlist!');
            }
            else {
                Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
                $this->emitTo('front-end.wishlist-count-component','refreshComponent');
                toastr()->success('Item is added to wishlist!');
            }
        }
        else {
            toastr()->error('Please first login in your account, then item added to wishlist!');
        }
    }
    //Render Method
    public function render()
    {
        //All Sliders Fetch
        $sliders = HomeSlider::where('status',1)->get();
        //Campaign Fetch
        $campaign = Campaign::where('start_date','<=',Carbon::now())->where('end_date','>=',Carbon::now())->where('status',1)->orderBy('id','DESC')->first();
        //Brands Fetch
        $brands = Brand::orderBy('id','DESC')->get()->take(24);
        //quick view product id to product fetch
        $product = Product::where('id',$this->quick_view_product_id)->first();
        //rating count
        $sum_rating=Review::where('product_id',$this->quick_view_product_id)->sum('rating');
        $count_rating=Review::where('product_id',$this->quick_view_product_id)->count('rating');
        //campaign fetch
        $campaignProduct = CampaignProduct::where('id',$this->campaign_product_id)->first();
        //wishlist items id check for remove
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
        //Latest Products Fetch
        $latest_products = Product::where('status',1)->orderBy('created_at','DESC')->get()->take(16);
        //Popular Products Fetch
        $popular_products = Product::where('status',1)->orderBy('product_views','DESC')->get()->take(16);
        //Featured Products Fetch
        $featured_products = Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->inRandomOrder()->get()->take(16);
        //Home Category find
        $category = HomeCategory::find(1);
        //Selected Category Fetch
        $cats = explode(",",$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        //Home Category Wise Product Fetch
        $no_of_products = $category->no_of_products;
        //Hot Sale Products Fetch
        $sale_products = Product::where('discounted_price','>',0)->where('status',1)->inRandomOrder()->get()->take(16);
        //Popular Categories Fetch
        $popular_categories = Category::where('category_views', '>=', 1)->where('active_status',1)->orderBy('id','DESC')->get()->take(8);
        //Website Reviews Fetch
        $websiteReviews = WebsiteReview::orderBy('id','DESC')->get();
        //Random Products fetch
        $randomProducts = Product::where('status',1)->orderBy('id','DESC')->inRandomOrder()->get()->take(16);
        //Auth Check With Save Product To Cart & Wishlist
        if(Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
            Cart::instance('saveForLater')->restore(Auth::user()->email);
        }
        //View Home Component
        return view('livewire.front-end.home-component',[
            'sliders'=>$sliders,
            'campaign'=>$campaign,
            'brands'=>$brands,
            'product'=>$product,
            'sum_rating'=>$sum_rating,
            'count_rating'=>$count_rating,
            'campaignProduct'=>$campaignProduct,
            'wishlist_items'=>$wishlist_items,
            'latest_products'=>$latest_products,
            'popular_products'=>$popular_products,
            'featured_products'=>$featured_products,
            'categories'=>$categories,
            'no_of_products'=>$no_of_products,
            'sale_products'=>$sale_products,
            'popular_categories'=>$popular_categories,
            'websiteReviews'=>$websiteReviews,
            'randomProducts'=>$randomProducts
            ])->layout('layouts.master');
    }
}
