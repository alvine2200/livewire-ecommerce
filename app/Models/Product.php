<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'small-description',
        'description',
        'meta_keyword',
        'meta_description',
        'meta_title',
        'quantity',
        'original_price',
        'selling_price',
        'trending',
        'status',
    ];

    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
}
