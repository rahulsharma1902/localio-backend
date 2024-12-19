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
                'meta_key' => 'top product banner image',
                'meta_value' => 'front/img/top-rated-bnr-bg.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product banner background image',
                'meta_value' => 'front/img/small-bnnr-bg.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product facebook icon',
                'meta_value' => 'header_logo/1734611650_Facebook.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product pinterest icon',
                'meta_value' => 'header_logo/1734611691_Pinterest.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product twitter icon',
                'meta_value' => 'header_logo/1734611712_Twitter.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product copylink icon',
                'meta_value' => 'header_logo/1734611735_Link.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product more icon',
                'meta_value' => 'header_logo/1734611756_More.svg',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key' => 'top product mail image',
                'meta_value' => 'header_logo/1734611997_subs.png',
                'lang_code'    =>   'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
        ]);
    }
}
