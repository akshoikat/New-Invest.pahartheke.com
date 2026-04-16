<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Uuid;
    
    protected $fillable = [
        'brand_id',
        'category_id',
        'name',
        'slug',
        'image',
        'thumbnail',
        'meta_tag',
        'meta_description',
        'regular_price',
        'discount_price',
        'status',
        'keywords',
        'quantity',
        'shipping_cost'
    ];


    protected $appends = [
        'thumb_url',
        'image_url',
    ];

    public function getThumbUrlAttribute()
    {
        return asset($this->thumbnail);
    }

    public function getImageUrlAttribute()
    {
        return asset($this->image);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    
}
