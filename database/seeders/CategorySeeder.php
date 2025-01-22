<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('categories')->insert([
            [
               'name'=> 'Business Software',
               'total_products'=>0,
               'total_reviews'=>0,
               'slug'=>Str::slug('Business Software'),
               'description'=>'lorem ispum has been the industry standerd dummy',
               'image'=>'NULL',
               'category_icon'=>'public/CategoryIcon/business-software391734503772.svg',
               'status'=>1,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ]
        ]);
    }
}