<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Policy;
use Illuminate\Support\Str;

class PolicysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $policies = [
            [
                'title' => 'Terms and Conditions',
                'description' => 'This is the description of the terms and conditions.',
            ],
            [
                'title' => 'Privacy Policy',
                'description' => 'This is the description of the privacy policy.',
            ],
            [
                'title' => 'Cookies',
                'description' => 'This is the description of the Cookies.',
            ],
        ];
    
        foreach ($policies as $policy) {
            Policy::create([
                'title' => $policy['title'],
                'description' => $policy['description'],
                'slug' => Str::slug($policy['title']), // Generate slug
            ]);
        }
    }
}
