<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestSettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('invest_settings')->insert([
            'logo' => 'logo.png',
            'company_name' => 'Pahartheke Ltd.',
            'company_description' => 'A trusted investment platform focused on sustainable growth.',
            'customer_care_phone_1' => '+880123456789',
            'customer_care_phone_2' => '+880987654321',
            'customer_care_email' => 'support@example.com',
            'corporate_phone' => '+8801122334455',
            'corporate_email' => 'corporate@example.com',
            'investment_phone' => '+8806677889900',
            'investment_email' => 'invest@example.com',
            'office_address' => 'Dhaka, Bangladesh',
            'general_email' => 'info@example.com',
            'google_play_link' => 'https://play.google.com/store/apps/details?id=example',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}