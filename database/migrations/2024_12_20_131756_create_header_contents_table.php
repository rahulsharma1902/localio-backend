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
        Schema::create('header_contents', function (Blueprint $table) {
            $table->id();
            $table->string('meta_key')->nullable();
            $table->text('meta_value')->nullable();
            $table->text('type')->nullable();
            $table->integer('lang_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_contents');
    }
};
