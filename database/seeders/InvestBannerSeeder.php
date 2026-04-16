<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestBannerSeeder extends Seeder
{
    public function run()
    {
        DB::table('invest_banners')->insert([
            'title' => 'Why Invest in Pahartheke?',
            'points' => json_encode([
                'High ROI opportunity',
                'Transparent reporting',
                'Strong market presence',
                'Trusted management team'
            ]),
            'button_text' => 'Express Interest to Invest',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}