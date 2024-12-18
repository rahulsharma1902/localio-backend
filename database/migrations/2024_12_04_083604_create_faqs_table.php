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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question')->nullable();  // Allow 'question' to be nullable
            $table->longText('answer')->nullable();  // Allow 'answer' to be nullable
            $table->string('status')->default('active');  // Default status to 'active'
            $table->timestamps();  // Created at and updated at times
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
