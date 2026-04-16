<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestFactSeeder extends Seeder
{
    public function run()
    {
        DB::table('invest_facts')->insert([
            [
                'icon' => 'fas fa-chart-line',
                'highlight_text' => '10+ Years',
                'description' => 'Industry Experience',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-users',
                'highlight_text' => '50K+',
                'description' => 'Active Investors',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}