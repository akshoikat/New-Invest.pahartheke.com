<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    use Uuid;

    protected $fillable = [
        'email',
        'message'
    ];
}
