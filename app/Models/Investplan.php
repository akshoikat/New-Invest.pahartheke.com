<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investplan extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'details',
        'button_text',
        'button_apply',
        'apply_link',
        'image_1',
        'image_2',
        'image_3',
    ];
}
