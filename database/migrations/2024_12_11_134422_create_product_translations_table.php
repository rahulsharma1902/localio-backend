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
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('language_id');
            $table->string('product_link')->default('https://default-link.com')->change();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
<<<<<<< HEAD
            $table->enum('status', ['public', 'private'])->nullable()->default('public');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')
            ;
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')
            ;
=======
            $table->string('status')->default('active');
           // $table->foreign('product_id')->references('id')->on('products')->onDelete('cacade');
            //$table->foreign('language_id')->references('id')->on('languages')->onDelete('cacade');
>>>>>>> 0858e0f4 ( test)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_translations');
    }
};
