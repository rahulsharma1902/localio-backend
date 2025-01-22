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
        Schema::create('who_we_ares', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('lang_id')->default(1);
            $table->string('main_heading')->nullable(); // Main heading
            $table->string('sub_heading')->nullable(); // Sub heading
            $table->string('bg_top_img')->nullable(); // Background top image
            $table->string('top_right_section_img')->nullable(); // Top right section image
            $table->string('mp_heading')->nullable(); // Middle page heading
            $table->string('mp_sub_heading')->nullable(); // Middle page sub-heading
            $table->string('top_card_title')->nullable(); // Top card title
            $table->string('top_card_image')->nullable(); // Top card image
            $table->text('top_card_desc')->nullable(); // Top card description
            $table->string('specialists_heading')->nullable(); // Specialists heading
            $table->string('ss_heading')->nullable(); // Service Software heading
            $table->text('ss_sub_desc')->nullable(); // Service Software sub-description
            $table->string('protfolio_btn')->nullable(); // Portfolio button text
            $table->integer('status')->default(1);// Status (active/inactive)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('who_we_ares');
    }
};
