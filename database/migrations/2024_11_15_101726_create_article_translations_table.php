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
        Schema::create('article_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('site_languages')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            // Manually define the created_at and updated_at columns
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
    
            // Ensure unique translation per article per language
            $table->unique(['article_id', 'language_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_translations');
    }
};
