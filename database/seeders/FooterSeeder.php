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
                'meta_key' => 'footer logo',
                'meta_value' => 'front/img/logo.svg',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key'      =>  'facebook logo',
                'meta_value'    =>  'header_logo/1734508523_facebook.svg',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'instagram logo',
                'meta_value' => 'header_logo/1734508559_Instagram.svg',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'twitter logo',
                'meta_value' => 'header_logo/1734508611_Twitter.svg',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'facebook url',
                'meta_value' => 'https://www.facebook.com/login/',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'instagram url',
                'meta_value' => 'https://www.instagram.com/accounts/login/',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key' => 'twitter url',
                'meta_value' => 'https://x.com/i/flow/login',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
        ]);
    }
}