<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_contents')->insert([
            [
                'meta_key' => 'header title',
                'meta_value' => 'Find the Best Deals and Save on Your Next Purchase!',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'header description',
                'meta_value' => 'Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'header image',
                'meta_value' => 'front/img/banner_image.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
