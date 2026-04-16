<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestSetting;

class InvestSettingController extends Controller
{
    public function index()
    {
        $setting = InvestSetting::first();
        return view('backend.invest-setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = InvestSetting::first(); // single row system

        // ======================
        // LOGO UPLOAD
        // ======================
        if ($request->hasFile('logo')) {

            if ($setting->logo && file_exists(storage_path('app/public/' . $setting->logo))) {
                unlink(storage_path('app/public/' . $setting->logo));
            }

            $logoPath = $request->file('logo')->store('settings', 'public');
            $setting->logo = $logoPath;
        }

        // ======================
        // BASIC INFO
        // ======================
        $setting->company_name = $request->company_name ?? $setting->company_name;
        $setting->company_description = $request->company_description ?? $setting->company_description;

        // ======================
        // CONTACT
        // ======================
        $setting->customer_care_phone_1 = $request->customer_care_phone_1 ?? $setting->customer_care_phone_1;
        $setting->customer_care_phone_2 = $request->customer_care_phone_2 ?? $setting->customer_care_phone_2;
        $setting->customer_care_email = $request->customer_care_email ?? $setting->customer_care_email;

        $setting->corporate_phone = $request->corporate_phone ?? $setting->corporate_phone;
        $setting->corporate_email = $request->corporate_email ?? $setting->corporate_email;

        $setting->investment_phone = $request->investment_phone ?? $setting->investment_phone;
        $setting->investment_email = $request->investment_email ?? $setting->investment_email;

        $setting->office_address = $request->office_address ?? $setting->office_address;
        $setting->general_email = $request->general_email ?? $setting->general_email;

        // ======================
        // LINKS
        // ======================
        $setting->google_play_link = $request->google_play_link ?? $setting->google_play_link;

        $setting->save();

        return back()->with('success', 'Setting Updated Successfully');
    }
}
