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
        Schema::create('rules_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rule_id')->constrained('rules')->onDelete('cascade'); // Foreign key to policies table
            $table->foreignId('language_id')->constrained('site_languages')->onDelete('cascade'); // Foreign key to site_languages table
            $table->string('title'); // Title of the policy in the selected language
            $table->string('slug')->nullable();
            $table->longText('description'); // Description of the policy in the selected language
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status field to indicate whether the translation is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_translations');
    }
};
