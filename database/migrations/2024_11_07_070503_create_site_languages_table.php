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
        Schema::create('site_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');               
            $table->string('handle')->unique();   
            $table->string('slug')->unique();     
            $table->foreignId('language_id')->nullable()->constrained('languages')->onDelete('set null'); 
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null');  
            $table->enum('status', ['active', 'pending'])->default('active');
            $table->integer('primary')->default(0)->nullable();     
            $table->timestamps();                 
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_languages');
    }
};
