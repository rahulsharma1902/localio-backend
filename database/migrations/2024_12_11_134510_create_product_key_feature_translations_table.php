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
            $table->unsignedBigInteger('product_key_id'); // Foreign key column without constraint
            $table->unsignedBigInteger('language_id'); // Foreign key column without constraint
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
