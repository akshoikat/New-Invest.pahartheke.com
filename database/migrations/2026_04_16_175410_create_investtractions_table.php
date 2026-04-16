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
        Schema::create('investtractions', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();         // e.g. fas fa-store
            $table->string('highlight')->nullable();    // e.g. "200k+"
            $table->string('description')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investtractions');
    }
};
