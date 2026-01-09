<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'is_subscription', 'duration_days', 'is_active', 'image_url'];

    public function category()
    {

        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
