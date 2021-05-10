<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id',
        'brand_id',
        'admin_id',
        'title',
        'description',
        'slug',
        'quantity',
        'price',
        'status',
        'offer_price',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }
}
