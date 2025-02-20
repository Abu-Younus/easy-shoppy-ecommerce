<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    public function SpecificationValues() {
        return $this->hasMany(SpecificationValue::class);
    }
}
