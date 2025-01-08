<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TopProductContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('top_product_contents')->insert([
            [
                'meta_key' => 'banner_image',
                'meta_value' => 'front/img/top-rated-bnr-bg.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',

            ],
            [
                'meta_key' => 'banner_bg_image',
                'meta_value' => 'front/img/small-bnnr-bg.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],
            [
                'meta_key' => 'facebook_icon',
                'meta_value' => 'header_logo/1734611650_Facebook.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],
            [
                'meta_key' => 'pinterest_icon',
                'meta_value' => 'header_logo/1734611691_Pinterest.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],
            [
                'meta_key' => 'twitter_icon',
                'meta_value' => 'header_logo/1734611712_Twitter.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],
            [
                'meta_key' => 'copylink_icon',
                'meta_value' => 'header_logo/1734611735_Link.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],
            [
                'meta_key' => 'more_icon',
                'meta_value' => 'header_logo/1734611756_More.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],
            [
                'meta_key' => 'mail_image',
                'meta_value' => 'header_logo/1734611997_subs.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',

            ],
            [
                'meta_key' => 'green_tick_img',
                'meta_value' => 'front/img/tick-img.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'file',


            ],

            // text section
            [
                'meta_key' => 'header_title',
                'meta_value' => 'Automotive',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'header_sub_title',
                'meta_value' => 'How to find the right Automotive Software',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'header_bottom_text',
                'meta_value' => 'Localio provides independent research and reviews. We may earn affiliate commissions.',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'learn_more',
                'meta_value' => 'Learn more',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'search_placeholder',
                'meta_value' => 'Search product name',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],

            [
                'meta_key' => 'user_rating',
                'meta_value' => 'User Rating',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'price',
                'meta_value' => 'Price',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'price_option',
                'meta_value' => 'Pricing Options',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'features',
                'meta_value' => 'Features',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'show_more',
                'meta_value' => 'Show more ',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'deployment',
                'meta_value' => 'Deployment',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],

            [
                'meta_key' => 'company_size',
                'meta_value' => 'Company Size',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'drop_down_text',
                'meta_value' => 'Top Rated Products',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'visit_website',
                'meta_value' => 'Visit Website',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'read_more',
                'meta_value' => 'Read More',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],

            [
                'meta_key' => 'key_features',
                'meta_value' => 'Key Features',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'starting_price',
                'meta_value' => 'Starting Price',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'month',
                'meta_value' => 'Month',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'compare_products',
                'meta_value' => 'Compare Products',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'rating',
                'meta_value' => 'ratings',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'footer_title',
                'meta_value' => ' Top-rated Products of',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => "footer_sub_title",
                'meta_value' => "Fill out the form and we'll send a list of the top-rated﻿ software based on real user reviews directly to your inbox.",
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'email_placeholder',
                'meta_value' => 'Email Address*',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'subscribe_lable',
                'meta_value' => 'Subscribe',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'you_agree',
                'meta_value' => 'By proceeding, you agree to our',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'terms_of_use',
                'meta_value' => 'Terms Of Use',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'privacy_policy',
                'meta_value' => 'Privacy Policy.',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],
            [
                'meta_key' => 'and',
                'meta_value' => 'and',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
                'type'          =>  'text',

            ],

        ]);
    }
}
