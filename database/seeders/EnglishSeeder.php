<?php

namespace Database\Seeders;

use App\Models\HomeContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnglishSeeder extends Seeder
{
    public function run(): void
    {
        $arr = [
            'header_title' => 'Find the Best Deals and Save on Your Next Purchase!',
            'header_description' => 'Get free, unbiased product comparisons, read real customer reviews, and',
            'header_background_img' => 'front/img/bnnr-bg.png',
            'header_img' => 'front/img/banner_image.png',
            'placeholder_text' => 'Enter a product, category, or what you’d like to compare...',
            'trusted_brands_text' => 'Trusted Brands, Unbeatable Choices',
            'trusted_brands_img' => 'front/img/marq-img1.svg',
            'most_popular' => 'Most Popular',
            'campare_business' => 'Compare Business Software',
            'visit_website' => 'visit website',
            'exclusive_deals' => 'Exclusive deals',
            'all_exclusive' => 'All Exclusive deals',
            'get_this_deal' => 'Get This Deal',
            'ai_section_left_img' => 'front/img/right-tool-vector1.png',
            'ai_section_right_img' => 'front/img/right-tool-vector2.png',
            'ai_title' => 'AI-Powered Smart Search',
            'ai_description' => 'Quickly discover and compare the best products with our AI-powered search, designed to match your specific needs and preferences.',
            'ai_placeholder' => 'Enter a product, category, or what you’d like to compare...',
            'ai_send_img' => 'front/img/btn-img.svg',
            'top_product' => 'Top Rated Products',
            'all_top_product' => 'All Top-Rated Products',
            'latest_reviews' => 'Latest Reviews',
            'write_review' => 'Write a Review',
            'review_section_right_img' => 'front/img/right-tool-vector1.png',
            'review_section_left_img' => 'front/img/right-tool-vector2.png',
            'read_article' => 'Read Our Articles',
            'view_all_article' => 'View All Articles',
            'find_tool' => 'Find the Right Tool',
            'find_tool_left_img' => 'front/img/right-tool-vector1.png',
            'find_tool_right_img' => 'front/img/right-tool-vector2.png',
            'user_reviews_img' => 'front/img/right-tool-img1.png',
            'verify_user_review' => 'Verified User Reviews',
            'verify_review_description' => 'Read real feedback from verified users to help you make the right choice.',
            'price_compare_img' => 'front/img/right-tool-img2.png',
            'feature_price' => 'Feature and Price Comparisons',
            'feature_price_description' => 'Easily compare software based on key features, pricing, and customer ratings.',
            'independent_img' => 'front/img/right-tool-img3.png',
            'independent' => 'Independent Insights',
            'independent_description' => 'Access unbiased, data-driven research to get the most value from your software.',
            'get_button_lable' => 'Get Started'
        ];

        foreach($arr as $meta_key => $meta_value){
            HomeContent::create([
                'meta_key'  => $meta_key,
                'meta_value' => $meta_value,
                'lang_id' => '1'
            ]);
        }
    }
}
