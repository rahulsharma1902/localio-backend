<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteLanguages;
class DefaultSiteLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (SiteLanguages::where('handle', 'en')->doesntExist()) {
            SiteLanguages::create([
                'name' => 'EN',       // Language name
                'handle' => 'en',     // Language handle
                'slug' => 'en',       // Language slug
                'primary' => 1, // Set this as the default language
                'status' => 'active', 
                'country_id' => null,    // You can modify this based on your countries table or remove if not required
                'language_id' => null,   // You can modify this based on your languages table or remove if not required
            ]);
        }
    }
}
