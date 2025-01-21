<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('footer_contents')->insert([
            [
                'meta_key' => 'footer_logo',
                'meta_value' => 'front/img/logo.svg',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key'      =>  'facebook_icon',
                'meta_value'    =>  'header_logo/1734508523_facebook.svg',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'instagram_icon',
                'meta_value' => 'header_logo/1734508559_Instagram.svg',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'twitter_icon',
                'meta_value' => 'header_logo/1734508611_Twitter.svg',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'facebook_url',
                'meta_value' => 'https://www.facebook.com/login/',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'instagram_url',
                'meta_value' => 'https://www.instagram.com/accounts/login/',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'twitter_url',
                'meta_value' => 'https://x.com/i/flow/login',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'discover',
                'meta_value' => 'Descover',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'categories',
                'meta_value' => 'Categories',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'top_rated_product',
                'meta_value' => 'Top Rated Products',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'exclusive_deal',
                'meta_value' => 'Exclusive deals',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'company',
                'meta_value' => 'Company',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'who_we_are',
                'meta_value' => 'Who We Are',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'privacy_policy',
                'meta_value' => 'Privacy Policy',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'terms_and_conditions',
                'meta_value' => 'Terms and Conditions',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'vendors',
                'meta_value' => 'Vendors',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'get_listed',
                'meta_value' => 'Get Listed',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'vendor_login',
                'meta_value' => 'Vendor Login',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'help',
                'meta_value' => 'Help',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'expert_guides',
                'meta_value' => 'Expert Guides',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'help_center',
                'meta_value' => 'help Center',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'contact',
                'meta_value' => 'Contact',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'follow_us',
                'meta_value' => 'Follow Us',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'facebook',
                'meta_value' => 'Facebook',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'instagram',
                'meta_value' => 'Instagram',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'twitter',
                'meta_value' => 'Twitter',
                'lang_id'     =>  '1',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        ]);
    }
}