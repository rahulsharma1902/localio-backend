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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the table
        DB::table('home_contents')->truncate();

        // Enable foreign key checks back
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('home_contents')->insert([
            [
                'meta_key' => 'meta_title',
                'meta_value' => 'Here is meta title heading',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'Meta_description',
                'meta_value' => 'Here is meta title description Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_login_title',
                'meta_value' => 'Here is meta login title heading',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_login_description',
                'meta_value' => 'Here is meta login title description Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_dashboard_title',
                'meta_value' => 'My Account',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_dashboard_description',
                'meta_value' => 'my aacount description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_product_title',
                'meta_value' => 'Saved Product',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_product_description',
                'meta_value' => 'saved product description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_review_title',
                'meta_value' => 'My Review',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_review_description',
                'meta_value' => 'review description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_reward_title',
                'meta_value' => 'My Reward',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_reward_description',
                'meta_value' => 'reward description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'meta_key' => 'meta_user_profile_title',
                'meta_value' => 'My Profile',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_user_profile_description',
                'meta_value' => 'my profile description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_vendor',
                'meta_value' => 'Here vendor login title heading',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_vendor_description',
                'meta_value' => 'Here is vendor title description Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_overview_title',
                'meta_value' => 'Overview',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_overview_description',
                'meta_value' => 'Here is vendor title description Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_profile_title',
                'meta_value' => 'My Profile',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_profile_description',
                'meta_value' => 'Here is vendor profile title description Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_add_new_list_title',
                'meta_value' => 'Add New List',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_add_new_list_description',
                'meta_value' => 'Add New List',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_edit_title',
                'meta_value' => 'Meta Edit title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_edit_description',
                'meta_value' => 'meta edit description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_analitic_report_title',
                'meta_value' => 'Add New List',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_analitic_report_title_description',
                'meta_value' => 'Add New List analitic',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_advertising_title',
                'meta_value' => 'meta advertising title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_advertising_description',
                'meta_value' => 'meta advertising description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_add_campaign_title',
                'meta_value' => 'meta add campaign title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_add_campaign_description',
                'meta_value' => 'meta add campaign description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_new_add_campaign_title',
                'meta_value' => 'meta new add campaign title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_new_add_campaign_description',
                'meta_value' => 'meta new add campaign description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'meta_key' => 'meta_vendor_review_title',
                'meta_value' => 'meta vendor review title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_vendor_review_description',
                'meta_value' => 'meta vendor review description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_vendor_review_managment_title',
                'meta_value' => 'meta vendor review managment title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_vendor_review_managment_description',
                'meta_value' => 'meta vendor review managment description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_support_title',
                'meta_value' => 'meta_support_title',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'meta_support_description',
                'meta_value' => 'meta_support_description',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'header_title',
                'meta_value' => 'Find the Best Deals and Save on Your Next Purchase!',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'header_description',
                'meta_value' => 'Get free, unbiased product comparisons, read real customer reviews, and',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'header_background_img',
                'meta_value' => 'front/img/bnnr-bg.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'header_img',
                'meta_value' => 'front/img/banner_image.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'placeholder_text',
                'meta_value' => 'Enter a product, category, or what you’d like to compare...',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'trusted_brands_text',
                'meta_value' => 'Trusted Brands, Unbeatable Choices',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'trusted_brands_img',
                'meta_value' => 'front/img/marq-img1.svg',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'most_popular',
                'meta_value' => 'Most Popular',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'campare_business',
                'meta_value' => 'Compare Business Software',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'visit_website',
                'meta_value' => 'visit website',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'exclusive_deals',
                'meta_value' => 'Exclusive deals',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'all_exclusive',
                'meta_value' => 'All Exclusive deals',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'get_this_deal',
                'meta_value' => 'Get This Deal',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'ai_section_left_img',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'ai_section_right_img',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'ai_title',
                'meta_value' => 'AI-Powered Smart Search',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'ai_description',
                'meta_value' => 'Quickly discover and compare the best products with our AI-powered search, designed to match your specific needs and preferences.',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'meta_key' => 'ai_placeholder',
                'meta_value' => 'Enter a product, category, or what you’d like to compare...',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'ai_send_img',
                'meta_value' => 'front/img/btn-img.svg',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'top_product',
                'meta_value' => 'Top Rated Products',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'all_top_product',
                'meta_value' => 'All Top-Rated Products',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'latest_reviews',
                'meta_value' => 'Latest Reviews',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'write_review',
                'meta_value' => 'Write a Review',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'review_section_right_img',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'review_section_left_img',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'read_article',
                'meta_value' => 'Read Our Articles',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'view_all_article',
                'meta_value' => 'View All Articles',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'find_tool',
                'meta_value' => 'Find the Right Tool',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'find_tool_left_img',
                'meta_value' => 'front/img/right-tool-vector1.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'find_tool_right_img',
                'meta_value' => 'front/img/right-tool-vector2.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'user_reviews_img',
                'meta_value' => 'front/img/right-tool-img1.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'verify_user_review',
                'meta_value' => 'Verified User Reviews',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'verify_review_description',
                'meta_value' => 'Read real feedback from verified users to help you make the right choice.',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'price_compare_img',
                'meta_value' => 'front/img/right-tool-img2.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'feature_price',
                'meta_value' => 'Feature and Price Comparisons',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'feature_price_description',
                'meta_value' => 'Easily compare software based on key features, pricing, and customer ratings.',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'independent_img',
                'meta_value' => 'front/img/right-tool-img3.png',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'independent',
                'meta_value' => 'Independent Insights',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'independent_description',
                'meta_value' => 'Access unbiased, data-driven research to get the most value from your software.',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
            [
                'meta_key' => 'get_button_lable',
                'meta_value' => 'Get Started',
                'lang_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),


            ],
        ]);
    }
}
