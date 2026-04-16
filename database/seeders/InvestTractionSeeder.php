<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestTractionSeeder extends Seeder
{
    public function run()
    {
        DB::table('investtractions')->insert([
            [
                'icon' => 'fas fa-store',
                'highlight' => '200k+',
                'description' => 'Products Sold',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-map-marker-alt',
                'highlight' => '64 Districts',
                'description' => 'Nationwide Coverage',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}