<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Uuid;
    
    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'regular_price',
        'discount_price',
        'starting_price',
        'status',
        'order',
        'shop_no',
        'read_more'
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'shop_now' => 'array',
        'read_more' => 'array'
    ];

    public function getImageUrlAttribute()
    {
        return asset($this->image);
    }
}
