<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionReply extends Model
{
    use HasFactory;

    public function productQuestion() {
        return $this->belongsTo(productQuestion::class);
    }
}
