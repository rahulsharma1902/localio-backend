<?php

namespace Database\Seeders;

use App\Models\FooterContent;
use App\Models\HeaderContent;
use App\Models\HomeContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnglishSeeder extends Seeder
{
    public function run(): void
    {
        $arr = [
            'header_title' => 'Find the best deals and save on your next purchase!',
            'header_description' => 'Get free and unbiased product comparisons, read reviews from real customers, and',
            'header_background_img' => 'front/img/bnnr-bg.png',
            'header_img' => 'front/img/banner_image.png',
            'placeholder_text' => 'Enter a product, category, or what you want to compare...',
            'trusted_brands_text' => 'Trusted brands, unbeatable options',
            'trusted_brands_img' => 'front/img/marq-img1.svg',
            'most_popular' => 'Most Popular',
            'campare_business' => 'Compare business software',
            'visit_website' => 'Visit website',
            'exclusive_deals' => 'Exclusive deals',
            'all_exclusive' => 'All exclusive deals',
            'get_this_deal' => 'Get this deal',
            'ai_section_left_img' => 'front/img/right-tool-vector1.png',
            'ai_section_right_img' => 'front/img/right-tool-vector2.png',
            'ai_title' => 'AI-powered Smart Search',
            'ai_description' => 'Quickly discover and compare the best products with our AI-driven search, designed to adapt to your specific needs and preferences.',
            'ai_placeholder' => 'Enter a product, category, or what you want to compare...',
            'ai_send_img' => 'front/img/btn-img.svg',
            'top_product' => 'Top-rated products',
            'all_top_product' => 'All top-rated products',
            'latest_reviews' => 'Latest reviews',
            'write_review' => 'Write a review',
            'review_section_right_img' => 'front/img/right-tool-vector1.png',
            'review_section_left_img' => 'front/img/right-tool-vector2.png',
            'read_article' => 'Read our articles',
            'view_all_article' => 'View all articles',
            'find_tool' => 'Find the right tool',
            'find_tool_left_img' => 'front/img/right-tool-vector1.png',
            'find_tool_right_img' => 'front/img/right-tool-vector2.png',
            'user_reviews_img' => 'front/img/right-tool-img1.png',
            'verify_user_review' => 'Verified user reviews',
            'verify_review_description' => 'Read real reviews from verified users to help you make the right decision.',
            'price_compare_img' => 'front/img/right-tool-img2.png',
            'feature_price' => 'Feature and price comparisons',
            'feature_price_description' => 'Easily compare software based on key features, prices, and user ratings.',
            'independent_img' => 'front/img/right-tool-img3.png',
            'independent' => 'Independent insights',
            'independent_description' => 'Access unbiased, data-driven research to get the best value from your software.',
            'get_button_lable' => 'Get Started'
        ];
        
        $headercontent = [
            'header_logo' => 'front/img/logo.svg',
            'header_search_placeholder' => 'Enter a product, category, or what you would like to compare...',
            'login_btn_lable' => 'Log In',
            'sign_up_btn_lable' => 'Sign Up',
            'sign_out_btn_lable' => 'Sign Out',
            'exclusive' => 'Exclusive',
            'categories' => 'Categories',
            'top_rated_product' => 'Top-rated product',
            'expert_guide' => 'Expert Guide',
            'help_center' => 'Help Center',
        ];
        
        $footercontent = [
            'footer_logo' => 'front/img/logo.svg',
            'facebook_icon' => 'header_logo/1734508523_facebook.svg',
            'instagram_icon' => 'header_logo/1734508559_Instagram.svg',
            'twitter_icon' => 'header_logo/1734508611_Twitter.svg',
            'facebook_url' => 'https://www.facebook.com/login/',
            'twitter_url' => 'https://www.instagram.com/accounts/login/',
            'discover' => 'https://x.com/i/flow/login',
            'categories' => 'Discover',
            'top_rated_product' => 'Top-rated products',
            'exclusive_deal' => 'Exclusive deals',
            'company' => 'Company',
            'who_we_are' => 'Who we are',
            'privacy_policy' => 'Privacy policy',
            'terms_and_conditions' => 'Terms and conditions',
            'vendors' => 'Vendors',
            'get_listed' => 'Sign up',
            'vendor_login' => 'Vendor login',
            'help' => 'Help',
            'expert_guides' => 'Expert guides',
            'help_center' => 'Help Center',
            'contact' => 'Contact',
            'follow_us' => 'Follow us',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
        ];
        

        foreach($arr as $meta_key=> $meta_value){
            HomeContent::create([
                'meta_key' => $meta_key,
                'meta_value' => $meta_value,
                'lang_id' => '1'
            ]);
        }

        foreach($headercontent as $meta_key=> $meta_value){
            HeaderContent::create([
                'meta_key' => $meta_key,
                'meta_value' => $meta_value,
                'lang_id' => '1'
            ]);
        }

        foreach($footercontent as $meta_key=> $meta_value){
            FooterContent::create([
                'meta_key' => $meta_key,
                'meta_value' => $meta_value,
                'lang_id' => '1'
            ]);
        }
    }
}
