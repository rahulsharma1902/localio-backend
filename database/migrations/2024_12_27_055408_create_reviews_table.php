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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key column without constraint
            $table->unsignedBigInteger('product_id'); // Foreign key column without constraint
            $table->longText('description');
            $table->unsignedTinyInteger('rating');
            $table->string('lang_code')->default('en'); 
            $table->tinyInteger('status')->default(0); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
