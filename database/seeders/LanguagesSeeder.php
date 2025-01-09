<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['id' => 1, 'name' => 'Argentina - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-ar'],
        ['id' => 2, 'name' => 'Australia - English', 'iso_639-1' => 'en', 'lang_code' => 'en-au'],
        ['id' => 3, 'name' => 'Brasil - Português', 'iso_639-1' => 'pt', 'lang_code' => 'pt-br'],
        ['id' => 4, 'name' => 'Canada - English', 'iso_639-1' => 'en', 'lang_code' => 'en-ca'],
        ['id' => 5, 'name' => 'Canada - Français', 'iso_639-1' => 'fr', 'lang_code' => 'fr-ca'],
        ['id' => 6, 'name' => 'Chile - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-cl'],
        ['id' => 7, 'name' => 'Colombia - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-co'],
        ['id' => 8, 'name' => 'Deutschland - Deutsch', 'iso_639-1' => 'de', 'lang_code' => 'de-de'],
        ['id' => 9, 'name' => 'España - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-es'],
        ['id' => 10, 'name' => 'Estados Unidos - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-us'],
        ['id' => 11, 'name' => 'France - Français', 'iso_639-1' => 'fr', 'lang_code' => 'fr-fr'],
        ['id' => 12, 'name' => 'Hong Kong - English', 'iso_639-1' => 'en', 'lang_code' => 'en-hk'],
        ['id' => 13, 'name' => 'India - English', 'iso_639-1' => 'en', 'lang_code' => 'en-in'],
        ['id' => 14, 'name' => 'Ireland - English', 'iso_639-1' => 'en', 'lang_code' => 'en-ie'],
        ['id' => 15, 'name' => 'Israel - English', 'iso_639-1' => 'en', 'lang_code' => 'en-il'],
        ['id' => 16, 'name' => 'Svizzera - Italiano', 'iso_639-1' => 'it', 'lang_code' => 'it-ch'],
        ['id' => 17, 'name' => 'Malaysia - English', 'iso_639-1' => 'en', 'lang_code' => 'en-my'],
        ['id' => 18, 'name' => 'México - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-mx'],
        ['id' => 19, 'name' => 'New Zealand - English', 'iso_639-1' => 'en', 'lang_code' => 'en-nz'],
        ['id' => 20, 'name' => 'Österreich - Deutsch', 'iso_639-1' => 'de', 'lang_code' => 'de-at'],
        ['id' => 21, 'name' => 'Pakistan - English', 'iso_639-1' => 'en', 'lang_code' => 'en-pk'],
        ['id' => 22, 'name' => 'Perú - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-pe'],
        ['id' => 23, 'name' => 'Philippines - English', 'iso_639-1' => 'en', 'lang_code' => 'en-ph'],
        ['id' => 24, 'name' => 'Polska - Polski', 'iso_639-1' => 'pl', 'lang_code' => 'pl-pl'],
        ['id' => 25, 'name' => 'Portuguese - Portugal', 'iso_639-1' => 'pt', 'lang_code' => 'pt-pt'],
        ['id' => 26, 'name' => 'Schweiz - Deutsch', 'iso_639-1' => 'de', 'lang_code' => 'de-ch'],
        ['id' => 27, 'name' => 'Singapore - English', 'iso_639-1' => 'en', 'lang_code' => 'en-sg'],
        ['id' => 28, 'name' => 'South Africa - English', 'iso_639-1' => 'en', 'lang_code' => 'en-za'],
        ['id' => 29, 'name' => 'Suisse - Français', 'iso_639-1' => 'fr', 'lang_code' => 'fr-ch'],
        ['id' => 30, 'name' => 'Türkiye - Türkçe', 'iso_639-1' => 'tr', 'lang_code' => 'tr-tr'],
        ['id' => 31, 'name' => 'United Arab Emirates - English', 'iso_639-1' => 'en', 'lang_code' => 'en-ae'],
        ['id' => 32, 'name' => 'United Kingdom - English', 'iso_639-1' => 'en', 'lang_code' => 'en-uk'],
        ['id' => 33, 'name' => 'United States - English', 'iso_639-1' => 'en', 'lang_code' => 'en-us'],
        ['id' => 34, 'name' => 'Venezuela - Español', 'iso_639-1' => 'es', 'lang_code' => 'es-ve'],
    ];

        DB::table('languages')->insert($languages);
    }
}
