<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = ['id'];

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_no = self::generateOrderNumber();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function generateOrderNumber()
    {
        $prefix = 'ORD-'; // Set your desired prefix
        $count = self::count() + 1; // Get total orders and increment by 1
        return $prefix . str_pad($count, 6, '0', STR_PAD_LEFT); // Format with leading zeros
    }
}
