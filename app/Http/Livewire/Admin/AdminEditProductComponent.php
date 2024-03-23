<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use App\Models\PickupPoint;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminEditProductComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //product update form all variables
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
    public $newimage;
    public $newimages;
    public $video;
    public $newvideo;
    public $status;
    public $product_id;
    public $product_slug;
    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;
    //mount function of product slug to retrive product data with database
    public function mount($product_slug) {
        $product = Product::where('slug', $product_slug)->first();
        $this->category_id = $product->category_id;
        $this->subcategory_id = $product->subcategory_id;
        //child category check
        if($product->childcategory_id) {
            $this->childcategory_id = $product->childcategory_id;
        }
        //brand check
        if($product->brand_id) {
            $this->brand_id = $product->brand_id;
        }
        //pickup point check
        if($product->pickup_point_id) {
            $this->pickup_point_id = $product->pickup_point_id;
        }
        //warehouse check
        if($product->warehouse_id) {
            $this->warehouse_id = $product->warehouse_id;
        }
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->purchase_price = $product->purchase_price;
        $this->regular_price = $product->regular_price;
        $this->discounted_price = $product->discounted_price;
        $this->unit = $product->unit;
        $this->SKU = $product->SKU;
        $this->featured = $product->featured;
        $this->today_deal = $product->today_deal;
        $this->cash_on_delivery = $product->cash_on_delivery;
        $this->trendy_product = $product->trendy_product;
        //cash on delivery select to delivery place check
        if($product->delivery_place) {
            $this->cash_on_delivery = 1;
            $this->delivery_place = $product->delivery_place;
        }
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",",$product->images);
        $this->video = $product->video;
        $this->status = $product->status;
        $this->product_id = $product->id;
        $this->inputs = $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->attribute_arr = $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        //attribute values check
        foreach($this->attribute_arr as $a_arr) {
            $allAttributeValue = AttributeValue::where('product_id',$product->id)->where('product_attribute_id',$a_arr)->get()->pluck('value');
            $valueString = '';
            foreach($allAttributeValue as $value) {
                $valueString = $valueString. $value .',';
            }
            $this->attribute_values[$a_arr] = rtrim($valueString,",");
        }
    }
    //product attribute add method
    public function add() {
        if(!$this->attribute_arr->contains($this->attr)) {
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
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
    //category select to category related sub category change
    public function changeSubCategory() {
        $this->subcategory_id = 0;
    }
    //sub category select to sub category related child category change
    public function changeChildCategory() {
        $this->childcategory_id = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:5|max:255',
            'slug'=>'required',
            'description'=>'required',
            'purchase_price'=>'required|numeric',
            'regular_price'=>'required|numeric',
            'unit'=>'required',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'category_id'=>'required',
            'subcategory_id'=>'required',
        ]);

        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //product update method
    public function updateProduct() {
        //form validation
        $this->validate([
            'name'=>'required|min:5|max:255',
            'slug'=>'required',
            'description'=>'required',
            'purchase_price'=>'required|numeric',
            'regular_price'=>'required|numeric',
            'unit'=>'required',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'category_id'=>'required',
            'subcategory_id'=>'required',
        ]);

        if($this->newimage) {
            $this->validate([
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //product update data store database
        $product = Product::find($this->product_id);
        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        //child category check
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
        //cash on delivery select to delivery place check
        if($this->delivery_place) {
            $product->delivery_place = $this->delivery_place;
        }
        $product->trendy_product = $this->trendy_product;
        $product->quantity = $this->quantity;
        //product image check
        if($this->newimage) {
            if($product->image) {
                unlink('assets/images/products'. '/' .$product->image);
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            Image::make($this->newimage)->resize(640,640)->save('assets/images/products/'.$imageName);
            $product->image = $imageName;
        }
        //product gallery check
        if($this->newimages) {
            if($product->images) {
                $images = explode(",",$product->images);
                foreach($images as $image) {
                    if($image) {
                        unlink('assets/images/products'. '/' .$image);
                    }
                }
            }
            $imagesName = '';
            foreach($this->newimages as $key=>$newimage) {
                $imgName = Carbon::now()->timestamp. $key. '.' .$newimage->extension();
                Image::make($newimage)->resize(640,640)->save('assets/images/products/'.$imgName);
                $imagesName = $imagesName. ',' .$imgName;
            }
            $product->images = $imagesName;
        }
        //product video check
        if($this->newvideo) {
            if($product->video) {
                unlink('assets/images/product-videos'. '/' .$product->video);
            }
            $videoName = $this->slug. '.' .$this->newvideo->extension();
            $this->newvideo->storeAs('product-videos',$videoName);
            $product->video = $videoName;
        }
        $product->status = $this->status;

        $product->save();
        //product attribute check
        AttributeValue::where('product_id',$product->id)->delete();
        if($this->attribute_values) {
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
        }

        toastr()->success('Updated successfully!', 'Congrats');
    }
    //render method
    public function render()
    {
        //all active categories fetch
        $categories = Category::where('active_status', 1)->get();
        //category related all sub categories fetch
        $subCategories = Subcategory::where('category_id', $this->category_id)->get();
        //sub category related all child categories fetch
        $childCategories = ChildCategory::where('subcategory_id',$this->subcategory_id)->get();
        //all brands fetch
        $brands = Brand::all();
        //all pickup points fetch
        $p_points = PickupPoint::all();
        //all warehouses fetch
        $warehouses = Warehouse::all();
        //all product attributes fetch
        $pattributes = ProductAttribute::all();
        //view of edit product component
        return view('livewire.admin.admin-edit-product-component',[
                        'categories'=>$categories,
                        'subCategories'=>$subCategories,
                        'childCategories'=>$childCategories,
                        'brands'=>$brands,
                        'p_points'=>$p_points,
                        'warehouses'=>$warehouses,
                        'pattributes'=>$pattributes
                    ])->layout('layouts.master');
    }
}
