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
        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id');
            $table->string('type')->comment('feture_type');
            $table->string('status')->default('active');
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_features_translation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('product_feture_id');
            $table->string('status')->default('active');
            $table->foreign('product_feture_id')->references('id')->on('product_features')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_features');
        Schema::dropIfExists('product_features_translation');
    }
};
