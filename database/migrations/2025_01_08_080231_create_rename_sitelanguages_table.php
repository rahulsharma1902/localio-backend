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
        Schema::table('site_languages', function (Blueprint $table) {
            $table->dropColumn('language_id');
            $table->dropColumn('primary');
            $table->renameColumn('handle','lang_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_languages', function (Blueprint $table) {
            //
        });
    }
};