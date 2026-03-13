<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'parent_id', 'display_order', 'is_active'];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany|ProductCategory
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany|ProductCategory
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
