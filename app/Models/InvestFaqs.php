<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestFaqs extends Model
{
    protected $fillable = ['question', 'answer', 'status'];
}
