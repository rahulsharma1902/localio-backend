<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PolicysSeeder::class,
            CountrySeeder::class,
            DefaultSiteLanguageSeeder::class,
            LanguagesSeeder::class,
            AdminSeeder::class,
            HomeContentSeeder::class,
            FooterSeeder::class,
            CategoryPageContent::class
        ]);
    }
}