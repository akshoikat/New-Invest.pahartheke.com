<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invest_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Why Invest in pahartheke ?');
            $table->json('points'); // store array of bullet points
            $table->string('button_text')->nullable()->default('Express Interest to Invest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invest_banners');
    }
};
