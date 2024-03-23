<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Auth;

class ProductCategoryComponent extends Component
{
    //Variable for Product Sorting
    public $sorting;
    public $pagesize;
    public $brand_id;
    //Variable for Price Range Slider
    public $min_price;
    public $max_price;
    //Variable for category,subcategory,childcategory slug
    public $category_slug;
    public $scategory_slug;
    public $ccategory_slug;

    //Mount function for fetch data
    public function mount($category_slug,$scategory_slug=null,$ccategory_slug=null) {
        $this->sorting = 'default';
        $this->pagesize = 12;
        $this->min_price = Product::min('regular_price');
        $this->max_price = Product::max('regular_price');
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
        $this->ccategory_slug = $ccategory_slug;
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
        //Variable for category, subcategory & childcategory filter
        $category_id = null;
        $category_name = "";
        $filter = "";

        //if else statement of category, subcategory & childcategory slug with fetch data
        if($this->ccategory_slug) {
            $childCategory = ChildCategory::where('slug',$this->ccategory_slug)->first();
            $category_id = $childCategory->id;
            $category_name = $childCategory->name;
            $filter = "child";
        }
        else if($this->scategory_slug) {
            $subCategory = SubCategory::where('slug',$this->scategory_slug)->first();
            $category_id = $subCategory->id;
            $category_name = $subCategory->name;
            $filter = "sub";
        }
        else {
            $category = Category::where('slug',$this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }

        //if else statement product sorting with date, price, name, popularity, rating, category, subcategory, childcategory, brand & product price
        if($this->sorting == 'date') {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price') {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-desc') {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('regular_price','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'alphabet-asc') {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('name','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'alphabet-desc') {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('name','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'popularity') {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('product_views', 'DESC')->paginate($this->pagesize);
        }
        else if($this->brand_id) {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->where('brand_id',$this->brand_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderby('name', 'DESC')->paginate($this->pagesize);
        }
        else {
            $products = Product::where($filter.'category_id',$category_id)->where('status',1)->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }
        //Single Category Fetch
        $category = Category::where('slug',$this->category_slug)->first();
        //All Sub Categories fetch
        $subCategories = SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get();
        //Brands Fetch
        $brands = Brand::all();
        //Recently Viewed Products Fetch
        $recent_products = Product::where('id',session()->get('product_id'))->get();
        //Category Views Count
        Category::where('slug',$this->category_slug)->increment('category_views');
        //wishlist items id check for remove
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
        //Auth check with cart and wishlist
        if(Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        //View Product Category Component
        return view('livewire.front-end.product-category-component',[
            'products'=>$products,
            'subCategories'=>$subCategories,
            'category'=>$category,
            'brands'=>$brands,
            'recent_products'=>$recent_products,
            'category_name'=>$category_name,
            'wishlist_items'=>$wishlist_items,
            ])->layout('layouts.master');
    }
}
