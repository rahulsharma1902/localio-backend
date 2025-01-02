<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalProductsAndTotalReviewsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify the existing categories table to add the new columns
        Schema::table('categories', function (Blueprint $table) {
            // Add total_products column (default 0)
            $table->integer('total_products')->default(0)->after('name'); // Adjust 'after' to the appropriate column

            // Add total_reviews column (default 0)
            $table->integer('total_reviews')->default(0)->after('total_products'); // Adjust 'after' to the appropriate column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the columns if the migration is rolled back
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['total_products', 'total_reviews']);
        });
    }
}
