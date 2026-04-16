<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name matches the model name)
    protected $table = 'affiliates';

    // Define the fillable fields
    protected $fillable = [
        'name',
        'price',
        'image',
        'link',
        'status',
        'repeat_customer',
    ];
}
