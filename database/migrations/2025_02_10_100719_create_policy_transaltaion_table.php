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
        Schema::create('policy_transaltaion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_id');
            $table->unsignedBigInteger('policy_id');
            $table->string('title');
            $table->text('description');
            $table->string('key');
            $table->string('status');
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_transaltaion');
    }
};
