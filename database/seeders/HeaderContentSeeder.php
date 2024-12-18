<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HeaderContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('header_contents')->insert([
            [
                'meta_key'  =>  'header logo',
                'meta_value'    =>  'front/img/logo.svg',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),

            ],
            [
                'meta_key'  =>  'header search placeholder',
                'meta_value'    =>  'Enter a product, category, or what you’d like to compare...',
                'lang_code'     =>  'en',
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ]
            ]);
    }
}
