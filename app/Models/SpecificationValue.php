<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationValue extends Model
{
    use HasFactory;

    public function ProductSpecification() {
        return $this->belongsTo(ProductSpecification::class,'product_specification_id');
    }
}
