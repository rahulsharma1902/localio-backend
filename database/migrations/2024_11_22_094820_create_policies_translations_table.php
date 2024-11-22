<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('policies_translations', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID field
            $table->foreignId('policy_id')->constrained('policies')->onDelete('cascade'); // Foreign key to policies table
            $table->foreignId('language_id')->constrained('site_languages')->onDelete('cascade'); // Foreign key to site_languages table
            $table->string('title'); // Title of the policy in the selected language
            $table->longText('description'); // Description of the policy in the selected language
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status field to indicate whether the translation is active
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies_translations');
    }
};
