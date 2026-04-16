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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->string('name');
            $table->string('address');
            $table->uuid('product_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('quantity');
            $table->float('subtotal', 10, 2);
            $table->float('delivery_charge', 10, 2);
            $table->float('total_price', 10, 2);
            $table->string('shipping_zone')->default('Inside Dhaka'); // 'Inside Dhaka' or 'Outside Dhaka'
            $table->decimal('shipping_cost', 8, 2)->default(0);
            $table->enum('status', ['Pending', 'Confirm', 'Delivered'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
