<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Uuid;
    
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'meta_description',
        'meta_tag',
        'status',
        'order'
    ];

    protected $appends = [
        'logo_url'
    ];

    public function getLogoUrlAttribute(){
        return asset($this->logo);
    }


    public function products(){
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
