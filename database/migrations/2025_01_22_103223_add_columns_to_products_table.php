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
        Schema::table('products', function (Blueprint $table) {
            $table->string('location')->nullable(); // New column for location
            $table->string('address')->nullable(); // New column for address
            $table->integer('year_founded')->nullable(); // New column for year founded
            $table->string('language_supported')->nullable(); // New column for supported languages
            $table->string('support_options')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['location', 'address', 'year_founded', 'language_supported','support_options']);
        });
    }
};
