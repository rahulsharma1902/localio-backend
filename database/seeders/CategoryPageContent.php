<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoryPageContent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('category_page_contents')->insert([
            [
                'meta_key'  =>  'header image',
                'meta_value'    =>  'front/img/ctgry-bannr.png',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                'meta_key'  =>  'header background image',
                'meta_value'    =>  'front/img/small-bnnr-bg.png',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ]
            ]);
    }
}
