<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_contents')->insert([
            'contact_heading' => 'Contact us',
            'image_first' => '',
            'image_second' => '',
            'footer_heading' => 'We are here to help!',
            'g_button' => 'Contact Us',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
