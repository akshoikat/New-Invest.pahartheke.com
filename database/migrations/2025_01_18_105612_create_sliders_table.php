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
        Schema::create('sliders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('sub_title');
            $table->double('regular_price', 8, 2)->default(0);
            $table->double('discount_price', 8, 2)->default(0);
            $table->double('starting_price', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->json('shop_now')->nullable();
            $table->json('read_more')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
