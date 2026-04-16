<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestSetting extends Model
{
    protected $fillable = [
        'logo',
        'company_name',
        'company_description',
        'customer_care_phone_1',
        'customer_care_phone_2',
        'customer_care_email',
        'corporate_phone',
        'corporate_email',
        'investment_phone',
        'investment_email',
        'office_address',
        'general_email',
        'google_play_link',
    ];
}
