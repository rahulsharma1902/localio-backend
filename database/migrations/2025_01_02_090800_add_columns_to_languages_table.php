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
        Schema::table('languages', function (Blueprint $table) {
            $table->string('lang_code', 10)->after('id'); // Adjust 'after' based on column order preference
            $table->foreignId('country_id')->nullable()->after('lang_code')->constrained('countries')->onDelete('cascade');
            $table->enum('status', ['blocked', 'active'])->default('active')->after('country_id');
            $table->tinyInteger('is_active_translation')->default(0)->after('status');
            $table->tinyInteger('is_valid_language_code')->default(0)->after('is_active_translation');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->dropColumn('lang_code');
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');
            $table->dropColumn('status');
            $table->dropColumn('is_active_translation');
            $table->dropColumn('is_valid_language_code');
        });
    }
};
