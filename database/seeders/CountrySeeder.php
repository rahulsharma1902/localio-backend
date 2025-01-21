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
        // Path to the countries CSV file
        $csvPath = database_path('csv/countries.csv');

        // Open the CSV file using League CSV reader
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            DB::table('countries')->insert([
                'country_code' => $row['country_code'] ?? null,        // Ensure 'iso' is in your CSV
                'name' => $row['name'] ?? null,      // Ensure 'name' is in your CSV
                // 'iso3' => $row['iso3'] ?? null, // iso3 is nullable
                // 'phonecode' => $row['dial'] ?? null, // Ensure 'dial' is in your CSV
                // 'currency' => $row['currency'] ?? null, // Ensure 'currency' is in your CSV
                // 'currency_name' => $row['currency_name'] ?? null // Ensure 'currency' is in your CSV
            ]);
        }
    }
}
