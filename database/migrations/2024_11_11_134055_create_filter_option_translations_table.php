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
 
        Schema::create('filter_option_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filter_option_id')->constrained('filter_options')->onDelete('cascade'); 
            $table->foreignId('language_id')->nullable()->constrained('languages')->onDelete('set null');
            $table->string('name'); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_option_translations');
    }
};
