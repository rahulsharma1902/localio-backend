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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('base_price')->nullable();
            $table->string('standard_price')->nullable();
            $table->string('pro_price')->nullable();
            $table->longtext('description');
            $table->decimal('product_price', 10, 2)->nullable();
            $table->string('product_icon');
            $table->string('product_image');
            $table->string('product_link');
            $table->enum('status', ['public', 'private'])->nullable()->default('public');
            $table->longtext('overview')->nullable();
            $table->string('location')->nullable();;
            $table->string('address')->nullable();;
            $table->integer('year_founded')->nullable();;
            $table->string('language_supported')->nullable();;
            $table->string('support_options')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
