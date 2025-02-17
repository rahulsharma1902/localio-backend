<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Policy;
use Illuminate\Support\Str;

class PolicysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('policies')->insert([
            [
                'lang_id' =>1
            ],
            [
                'lang_id' =>1
            ],
            [
                'lang_id' =>1
            ],
            [
                'lang_id' =>1
            ],
            [
                'lang_id' =>1
            ]
        ]);
        DB::table('policy_transaltaion')->insert([
            [
                'lang_id' => 1,
                'policy_id' => 1,
                'title' => 'Privacy Policy',
                'description' => 'This is the privacy policy description.',
                'key' => 'privacy_policy',
                'status' => "active",
            ],
            [
                'lang_id' => 2,
                'policy_id' =>2,
                'title' => 'Terms & Conditions',
                'description' => 'These are the terms and conditions.',
                'key' => 'terms_conditions',
                'status' => "active",
            ],
            [
                'lang_id' => 1,
                'policy_id' => 3,
                'title' => 'Refund Policy',
                'description' => 'This is the refund policy description.',
                'key' => 'refund_policy',
                'status' => "active",
            ],
            [
                'lang_id' => 2,
                'policy_id' => 4,
                'title' => 'Shipping Policy',
                'description' => 'This is the shipping policy description.',
                'key' => 'shipping_policy',
                'status' => "active",
            ],
            [
                'lang_id' => 1,
                'policy_id' => 5,
                'title' => 'Cookie Policy',
                'description' => 'This is the cookie policy description.',
                'key' => 'cookie_policy',
                'status' => "active",
            ],
        ]);



    }
}
