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
        Schema::create('invest_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_description')->nullable();

            // Customer care
            $table->string('customer_care_phone_1')->nullable();
            $table->string('customer_care_phone_2')->nullable();
            $table->string('customer_care_email')->nullable();

            // Corporate
            $table->string('corporate_phone')->nullable();
            $table->string('corporate_email')->nullable();

            // Investment
            $table->string('investment_phone')->nullable();
            $table->string('investment_email')->nullable();

            // General
            $table->string('office_address')->nullable();
            $table->string('general_email')->nullable();
            $table->string('google_play_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invest_settings');
    }
};
