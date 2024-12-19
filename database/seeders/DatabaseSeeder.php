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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PolicysSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DefaultSiteLanguageSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call([HomeContentSeeder::class,]);
        $this->call([HeaderContentSeeder::class]);
        $this->call([FooterSeeder::class]);
        $this->call([CategoryPageContent::class]);
        
    }
}
