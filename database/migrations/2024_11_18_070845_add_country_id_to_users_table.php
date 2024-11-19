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
        Schema::table('users', function (Blueprint $table) {
            // Add the 'country_id' column with the foreign key constraint
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint and the 'country_id' column
            $table->dropForeign(['country_id']);  // Drop the foreign key constraint
            $table->dropColumn('country_id');     // Drop the column itself
        });
    }
};