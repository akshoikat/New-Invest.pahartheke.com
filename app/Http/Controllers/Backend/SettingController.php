<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\Traits\FileSaver;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class SettingController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $setting = Setting::first() ?? new Setting();

        if ($request->social_links) {
            $setting->updateOrCreate(
                ['id' => $setting->id], // Condition to check if a record exists
                [
                    "facebook_url" => $request->facebook_url,
                    "youtube_url" => $request->youtube_url,
                    "instagram_url" => $request->instagram_url,
                    "whatsapp_url" => $request->whatsapp_url
                ]
            );
        }

        if ($request->website_title) {
            // dd($request->all());
            $setting->updateOrCreate(
                ['id' => $setting->id], // Condition to check if a record exists
                [
                    "website_title" => $request->website_title,
                    "address" => $request->address,
                    "website_description" => $request->website_description,
                    "repeat_customer" => $request->repeat_customer,
                ]
                
            );
        }

        if ($request->contact == 1) {

            // dd($request->all());
            $setting->updateOrCreate(
                ['id' => $setting->id], // Condition to check if a record exists
                [
                    "phone" => $request->phone,
                    "email" => $request->email
                ]
            );
        }


        if ($request->image_uplaod == 1) {

            $setting2 = Setting::first() ?? new Setting();

            if ($request->hasFile('logo')) {
                $logoName = $this->upload_file($request->file('logo'), 'logo', $setting2->logo, $setting2->website_name);
                $setting->updateOrCreate(
                    ['id' => $setting->id], 
                    [
                        "logo" => $logoName,
                    ]
                );
            }
    
            if ($request->hasFile('favicon')) {
                $favName = $this->upload_file($request->file('favicon'), 'favicon', $setting2->favicon, $setting2->website_name);
                $setting->updateOrCreate(
                    ['id' => $setting->id], 
                    [
                        "favicon" => $favName,
                    ]
                );
            }
        }



  





       

       

        flash()->option('position', 'bottom-right')->option('timeout', 2000)->success('Setting Updated successfully');

        return redirect()->back();
    }
}
