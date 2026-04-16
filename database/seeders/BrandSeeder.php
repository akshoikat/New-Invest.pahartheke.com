<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Pahar Theke', 'status' => 'active', 'meta_tag' => 'Pahar', 'meta_description' => 'Pahar'],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate([
                'name' => $brand['name'],
                'slug' => Str::slug($brand['name']),
                'status' => $brand['status'],
                'meta_tag' => $brand['meta_tag'],
                'meta_description' => $brand['meta_description'],
            ]);
        }
    }
}
