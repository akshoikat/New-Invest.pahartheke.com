<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // protected $fillable = [
    //     'website_name',
    //     'phone',
    //     'email',
    //     'header_title',
    //     'footer_text',
    //     'logo',
    //     'favicon',
    //     'website_title',
    //     'address',
    //     'website_description',  
    //     'facebook_url',
    //     'youtube_url',
    //     'instagram_url',
    //     'whatsapp_url',
    //     'Repeat_Customer',
        
        
        
    // ];

    protected $guarded = ['id'];


    protected $appends = [
        'logo_url',
        'favicon_url'
    ];

    public function getLogoUrlAttribute(){
        return asset($this->logo);
    }

    public function getFaviconUrlAttribute(){
        return asset($this->logo);
    }
}
