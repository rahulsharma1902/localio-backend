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
            
            // [
            //     'meta_key' => 'logo image',
            //     'meta_value' => 'front/img/logo.svg',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'header title',
            //     'meta_value' => 'Find the Best Deals and Save on Your Next Purchase!',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'header description',
            //     'meta_value' => 'Get free, unbiased product comparisons, read real customer reviews, and',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'meta_key' => 'header background image',
                'meta_value' => 'front/img/bnnr-bg.png',
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
            // [
            //     'meta_key' => 'visit website',
            //     'meta_value' => 'Visit Website',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'trusted brands text',
            //     'meta_value' => 'Trusted Brands, Unbeatable Choices',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'meta_key' => 'trusted brands image',
                'meta_value' => 'front/img/marq-img1.svg',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'meta_key' => 'most popular text',
            //     'meta_value' => 'Most Popular',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'exclusive deals text',
            //     'meta_value' => 'Exclusive deals',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'all exclusive lable',
            //     'meta_value' => 'All Exclusive deals',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'get deal lable',
            //     'meta_value' => 'Get This Deal',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'meta_key' => 'ai section left image',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'ai section right image',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'meta_key' => 'ai search title',
            //     'meta_value' => 'AI-Powered Smart Search',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'ai search description',
            //     'meta_value' => 'Quickly discover and compare the best products with our AI-powered search, designed to match your specific needs and preferences.',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'top product text',
            //     'meta_value' => 'Top Rated Products',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'all product lable',
            //     'meta_value' => 'All Top-Rated Products',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'latest reviews text',
            //     'meta_value' => 'Latest Reviews',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'write review lable',
            //     'meta_value' => 'Write a Review',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'read article text',
            //     'meta_value' => 'Read Our Articles',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'view article lable',
            //     'meta_value' => 'View All Articles',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'meta_key' => 'find tool text',
            //     'meta_value' => 'Find the Right Tool',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'meta_key' => 'find tool left image',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'find tool right image',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'verified user reviews image',
                'meta_value' => 'front/img/right-tool-img1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'feature price image',
                'meta_value' => 'front/img/right-tool-img2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'independent image',
                'meta_value' => 'front/img/right-tool-img3.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // [
            //     'meta_key' => 'get button lable',
            //     'meta_value' => 'Get Started',
            //     'lang_code' => 'en',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
