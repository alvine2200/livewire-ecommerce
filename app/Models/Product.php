<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'small_description',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
