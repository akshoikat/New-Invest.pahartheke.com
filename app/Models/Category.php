<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Uuid;

    protected $fillable = [
        'name', 
        'status',
        'parent_id',
        'order',
        'meta_tag',
        'meta_description',
        'keywords'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
