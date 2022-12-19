<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
