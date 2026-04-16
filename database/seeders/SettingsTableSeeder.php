<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('settings')->insert([
            'website_name' => 'My Awesome Website',
            'phone' => '+1234567890',
            'email' => 'contact@mywebsite.com',
            'header_title' => 'Welcome to My Awesome Website',
            'footer_text' => '© 2025 My Awesome Website. All Rights Reserved.',
            'logo' => 'logo.png',
            'favicon' => 'favicon.ico',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
