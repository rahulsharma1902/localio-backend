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
        Schema::create('terms_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id');
            $table->unsignedBigInteger('terms_id');
            $table->string('title');
            $table->text('description');
            $table->string('key');
            $table->string('status');
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('terms_id')->references('id')->on('terms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_translations');
    }
};
