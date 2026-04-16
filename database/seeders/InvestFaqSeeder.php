<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestFaqSeeder extends Seeder
{
    public function run()
    {
        DB::table('invest_faqs')->insert([
            [
                'question' => 'What is the minimum investment amount?',
                'answer' => 'The minimum investment amount is 50,000 BDT.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How do I apply for investment?',
                'answer' => 'Click on Apply Now button and complete the form.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}