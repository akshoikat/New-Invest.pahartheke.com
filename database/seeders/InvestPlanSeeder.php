<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestPlanSeeder extends Seeder
{
    public function run()
    {
        DB::table('investplans')->insert([
            [
                'title' => 'Starter Investment Plan',
                'short_description' => 'Perfect plan for small investors.',
                'details' => 'This plan allows small investors to start with minimal capital and earn stable returns.',
                'button_text' => 'View Details',
                'button_apply' => 'Apply Now',
                'apply_link' => 'https://example.com/apply/starter',
                'image_1' => 'plan1.jpg',
                'image_2' => 'plan1_2.jpg',
                'image_3' => 'plan1_3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Premium Investment Plan',
                'short_description' => 'High return premium investment plan.',
                'details' => 'Designed for serious investors who want higher ROI and long-term growth.',
                'button_text' => 'View Details',
                'button_apply' => 'Apply Now',
                'apply_link' => 'https://example.com/apply/premium',
                'image_1' => 'plan2.jpg',
                'image_2' => 'plan2_2.jpg',
                'image_3' => 'plan2_3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}