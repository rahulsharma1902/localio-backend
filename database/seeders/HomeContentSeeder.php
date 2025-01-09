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
                'meta_key' => 'header_title',
                'meta_value' => 'Find the Best Deals and Save on Your Next Purchase!',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',
            ],
            [
                'meta_key' => 'header_description',
                'meta_value' => 'Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'description',
            ],
            [
                'meta_key' => 'header_background_img',
                'meta_value' => 'front/img/bnnr-bg.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',
            ],
            [
                'meta_key' => 'header_img',
                'meta_value' => 'front/img/banner_image.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',
            ],
            [
                'meta_key' => 'placeholder_text',
                'meta_value' => 'Enter a product, category, or what you’d like to compare...',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'trusted_brands_text',
                'meta_value' => 'Trusted Brands, Unbeatable Choices',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'trusted_brands_img',
                'meta_value' => 'front/img/marq-img1.svg',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'most_popular',
                'meta_value' => 'Most Popular',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'campare_business',
                'meta_value' => 'Compare Business Software',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'visit_website',
                'meta_value' => 'visit website',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'exclusive_deals',
                'meta_value' => 'Exclusive deals',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'all_exclusive',
                'meta_value' => 'All Exclusive deals',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'get_this_deal',
                'meta_value' => 'Get This Deal',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'ai_section_left_img',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'ai_section_right_img',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'ai_title',
                'meta_value' => 'AI-Powered Smart Search',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'ai_description',
                'meta_value' => 'Quickly discover and compare the best products with our AI-powered search, designed to match your specific needs and preferences.',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'description',

            ],
            [
                'meta_key' => 'ai_placeholder',
                'meta_value' => 'Enter a product, category, or what you’d like to compare...',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'ai_send_img',
                'meta_value' => 'front/img/btn-img.svg',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'top_product',
                'meta_value' => 'Top Rated Products',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'all_top_product',
                'meta_value' => 'All Top-Rated Products',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'latest_reviews',
                'meta_value' => 'Latest Reviews',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'write_review',
                'meta_value' => 'Write a Review',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'review_section_right_img',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'review_section_left_img',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'read_article',
                'meta_value' => 'Read Our Articles',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'view_all_article',
                'meta_value' => 'View All Articles',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'find_tool',
                'meta_value' => 'Find the Right Tool',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'find_tool_left_img',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'find_tool_right_img',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'user_reviews_img',
                'meta_value' => 'front/img/right-tool-img1.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'verify_user_review',
                'meta_value' => 'Verified User Reviews',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'verify_review_description',
                'meta_value' => 'Read real feedback from verified users to help you make the right choice.',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'price_compare_img',
                'meta_value' => 'front/img/right-tool-img2.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'feature_price',
                'meta_value' => 'Feature and Price Comparisons',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'feature_price_description',
                'meta_value' => 'Easily compare software based on key features, pricing, and customer ratings.',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'independent_img',
                'meta_value' => 'front/img/right-tool-img3.png',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'file',

            ],
            [
                'meta_key' => 'independent',
                'meta_value' => 'Independent Insights',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'independent_description',
                'meta_value' => 'Access unbiased, data-driven research to get the most value from your software.',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
            [
                'meta_key' => 'get_button_lable',
                'meta_value' => 'Get Started',
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
                'type'      =>  'text',

            ],
        ]);
    }
}