<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['quantity'];

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subCategory() {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function subCategories() {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function childCategory() {
        return $this->belongsTo(ChildCategory::class,'childcategory_id');
    }

    public function childCategories() {
        return $this->belongsTo(ChildCategory::class,'childcategory_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function pickupPoint() {
        return $this->belongsTo(PickupPoint::class,'pickup_point_id');
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function attributeValues() {
        return $this->hasMany(AttributeValue::class,'product_id');
    }

    public function SpecificationValues() {
        return $this->hasMany(SpecificationValue::class,'product_id');
    }

    public function Questions() {
        return $this->hasMany(ProductQuestion::class,'product_id');
    }

    public function campaignProducts() {
        return $this->hasMany(CampaignProduct::class,'product_id');
    }
}
