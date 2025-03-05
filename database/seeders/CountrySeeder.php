<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class CountrySeeder extends Seeder
{
    public function run()
    {
        // Truncate the table to remove existing data and reset auto-increment
        DB::table('countries')->truncate();

        // Path to the countries CSV file
        $csvPath = database_path('csv/countries.csv');

        // Open the CSV file using League CSV reader
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            DB::table('countries')->insert([
                'country_code' => $row['country_code'] ?? null,  // Ensure 'country_code' exists in CSV
                'name' => $row['name'] ?? null,  // Ensure 'name' exists in CSV
                // 'iso3' => $row['iso3'] ?? null, // Uncomment if needed
                // 'phonecode' => $row['dial'] ?? null, // Uncomment if needed
                // 'currency' => $row['currency'] ?? null, // Uncomment if needed
                // 'currency_name' => $row['currency_name'] ?? null // Uncomment if needed
            ]);
        }
    }
}
