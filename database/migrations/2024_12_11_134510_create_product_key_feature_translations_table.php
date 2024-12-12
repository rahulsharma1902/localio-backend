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
        Schema::create('product_key_feature_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_key_id')->constrained('product_key_features')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('site_languages')->onDelete('cascade');
            $table->string('feature');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_key_feature_translations');
    }
};
