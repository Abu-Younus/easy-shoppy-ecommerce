<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use App\Models\PickupPoint;
use App\Models\Warehouse;
use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\AttributeValue;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminAddProductComponent extends Component
{
    //laravle fileuploads use
    use WithFileUploads;
    //product store form all variables
    public $category_id;
    public $subcategory_id;
    public $childcategory_id;
    public $brand_id;
    public $pickup_point_id;
    public $warehouse_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $purchase_price;
    public $regular_price;
    public $discounted_price;
    public $unit;
    public $SKU;
    public $featured;
    public $today_deal;
    public $cash_on_delivery;
    public $delivery_place;
    public $trendy_product;
    public $quantity;
    public $image;
    public $images;
    public $video;
    public $status;
    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;
    //status, featured, today deal, trendy product and cash on delivery initialize to mount function
    public function mount() {
        $this->status = 1;
        $this->featured = 0;
        $this->today_deal = 0;
        $this->trendy_product = 0;
        $this->cash_on_delivery = 0;
    }
    //product attribute add method
    public function add() {
        if(!in_array($this->attr,$this->attribute_arr)) {
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);
        }
    }
    //product attribute remove method
    public function remove($attr) {
        unset($this->inputs[$attr]);
    }
    //generate slug to product name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //category select to category related subcategory change function
    public function changeSubCategory() {
        $this->subcategory_id = 0;
    }
    //subcategory select to subcategory related childcategory change function
    public function changeChildCategory() {
        $this->childcategory_id = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:5|max:255',
            'slug'=>'required|unique:products',
            'description'=>'required',
            'purchase_price'=>'required|numeric',
            'regular_price'=>'required|numeric',
            'unit'=>'required',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required|mimes:jpg,jpeg,png',
            'category_id'=>'required',
            'subcategory_id'=>'required',
        ]);

        if($this->cash_on_delivery == 1) {
            $this->validateOnly($fields,[
                'delivery_place'=>'required|min:3|max:255',
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->category_id = null;
        $this->subcategory_id = null;
        $this->childcategory_id = null;
        $this->brand_id = null;
        $this->pickup_point_id = null;
        $this->warehouse_id = null;
        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->description = '';
        $this->purchase_price = '';
        $this->regular_price = '';
        $this->unit = null;
        $this->sku = '';
        $this->featured = 0;
        $this->today_deal = 0;
        $this->cash_on_delivery = 0;
        $this->delivery_place = '';
        $this->image = null;
        $this->trendy_product = 0;
        $this->quantity = '';
        $this->image = null;
        $this->images = null;
        $this->video = null;
        $this->status = 1;
        $this->attr = '';
        $this->inputs = [];
        $this->attribute_arr = [];
        $this->attribute_values = '';
    }
    //product store method
    public function addProduct() {
        //form validation
        $this->validate([
            'name'=>'required|min:5|max:255',
            'slug'=>'required|unique:products',
            'description'=>'required',
            'purchase_price'=>'required|numeric',
            'regular_price'=>'required|numeric',
            'unit'=>'required',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required|mimes:jpg,jpeg,png',
            'category_id'=>'required',
            'subcategory_id'=>'required',
        ]);

        if($this->cash_on_delivery == 1) {
            $this->validate([
                'delivery_place'=>'required|min:3|max:255',
            ]);
        }
        //product store database
        $product = new Product();
        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        if($this->childcategory_id) {
            $product->childcategory_id = $this->childcategory_id;
        }
        $product->brand_id = $this->brand_id;
        $product->pickup_point_id = $this->pickup_point_id;
        $product->warehouse_id = $this->warehouse_id;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->purchase_price = $this->purchase_price;
        $product->regular_price = $this->regular_price;
        $product->discounted_price = $this->discounted_price;
        $product->unit = $this->unit;
        $product->SKU = $this->SKU;
        $product->featured = $this->featured;
        $product->today_deal = $this->today_deal;
        $product->cash_on_delivery = $this->cash_on_delivery;
        //cash on delivery check
        if($this->delivery_place) {
            $product->delivery_place = $this->delivery_place;
        }
        $product->trendy_product = $this->trendy_product;
        $product->quantity = $this->quantity;
        //product image store
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        Image::make($this->image)->resize(640,640)->save('assets/images/products/'.$imageName);
        $product->image = $imageName;
        //product gallery store
        if($this->images) {
            $imagesName = '';
            foreach($this->images as $key=>$image) {
                $imgName = Carbon::now()->timestamp. $key. '.' .$image->extension();
                Image::make($image)->resize(640,640)->save('assets/images/products/'.$imgName);
                $imagesName = $imagesName. ',' .$imgName;
            }
            $product->images = $imagesName;
        }

        $videoName = $this->slug. '.' .$this->video->extension();
        $this->video->storeAs('product-videos',$videoName);
        $product->video = $videoName;
        $product->status = $this->status;

        $product->save();
        //product attribute store
        foreach($this->attribute_values as $key=>$attribute_value) {
            $avalues = explode(",",$attribute_value);
            foreach($avalues as $avalue) {
                $attr_value = new AttributeValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        $this->resetForm();
        toastr()->success('Added successfully!');
    }
    //render method
    public function render()
    {
        //all categories fetch
        $categories = Category::where('active_status', 1)->get();
        //category related all sub categories fetch
        $subCategories = Subcategory::where('category_id', $this->category_id)->get();
        //subcategory related all child categories fetch
        $childCategories = ChildCategory::where('subcategory_id',$this->subcategory_id)->get();
        //all brands fetch
        $brands = Brand::all();
        //all pickup points fetch
        $p_points = PickupPoint::all();
        //all warehouses fetch
        $warehouses = Warehouse::all();
        //all product attributes fetch
        $pattributes = ProductAttribute::all();
        //view of add product component
        return view('livewire.admin.admin-add-product-component',[
                        'categories'=>$categories,
                        'subCategories'=>$subCategories,
                        'childCategories'=>$childCategories,
                        'brands'=>$brands,
                        'pattributes'=>$pattributes,
                        'p_points'=>$p_points,
                        'warehouses'=>$warehouses
                    ])->layout('layouts.master');
    }
}
