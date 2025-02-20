<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignProduct extends Model
{
    use HasFactory;

    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
