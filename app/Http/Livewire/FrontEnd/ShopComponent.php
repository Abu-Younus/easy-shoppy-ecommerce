<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Auth;

class ShopComponent extends Component
{
    //variable for products sort
    public $sorting;
    public $pagesize;
    public $brand_id;
    //variable for price filter
    public $min_price;
    public $max_price;

    //Mount function for fetch data
    public function mount() {
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->min_price = Product::min('regular_price');
        $this->max_price = Product::max('regular_price');
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

    //Pagination use
    use WithPagination;
    //Render method
    public function render()
    {
        //if else statement product sorting with date, price, name, popularity, rating, brand & product price
         if($this->sorting == 'date') {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price') {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('regular_price', 'ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-desc') {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'alphabet-asc') {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('name', 'ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'alphabet-desc') {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('name', 'DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'popularity') {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('product_views', 'DESC')->paginate($this->pagesize);
        }
        else if($this->brand_id) {
            $products = Product::where('status',1)->where('brand_id',$this->brand_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('name', 'DESC')->paginate($this->pagesize);
        }
        else {
            $products = Product::where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }
        //All Sub Categories fetch
        $subCategories = SubCategory::orderBy('id','ASC')->get();
        //Brands Fetch
        $brands = Brand::all();
        //Recently Viewed Products Fetch
        $recent_products = Product::where('id',session()->get('product_id'))->get();
        //wishlist items id check for remove
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');

        //Auth check with cart and wishlist store
        if(Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        //view shop component
        return view('livewire.front-end.shop-component',[
            'products'=>$products,
            'subCategories'=>$subCategories,
            'brands'=>$brands,
            'recent_products'=>$recent_products,
            'wishlist_items'=>$wishlist_items
            ])->layout('layouts.master');
    }
}
