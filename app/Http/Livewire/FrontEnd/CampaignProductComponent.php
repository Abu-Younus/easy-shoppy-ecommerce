<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\CampaignProduct;
use App\Models\Campaign;
use Livewire\Component;
use Cart;
use Auth;

class CampaignProductComponent extends Component
{
    //campaign slug variable
    public $campaign_slug;
    public $campaign_id;
    //mount function of campaign slug to campaign data retrive with database
    public function mount($campaign_slug) {
        $this->campaign_slug = $campaign_slug;
        $campaign = Campaign::where('slug',$this->campaign_slug)->first();
        $this->campaign_id = $campaign->id;
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
    //Add to Wishlist Product Method
    public function addToWishlist($product_id, $product_name, $product_price) {
        if(Auth::check()) {
            Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
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
    //render method
    public function render()
    {
        //campaign products fetch
        $campaignProducts = CampaignProduct::where('campaign_id',$this->campaign_id)->orderBy('id','DESC')->get();
        //wishlist items id check for remove
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
        //Auth check with cart and wishlist store
        if(Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        //view of campaign product component
        return view('livewire.front-end.campaign-product-component',['campaignProducts'=>$campaignProducts,'wishlist_items'=>$wishlist_items])->layout('layouts.master');
    }
}
