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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->uuid('brand_id');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->string('name', 60);
            $table->string('slug', 60);
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('meta_tag', 20)->nullable();
            $table->text('meta_description')->nullable();
            $table->double('regular_price', 8, 2)->default(0);
            $table->double('discount_price', 8, 2)->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('keywords')->nullable();
            $table->text('shipping_cost')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
