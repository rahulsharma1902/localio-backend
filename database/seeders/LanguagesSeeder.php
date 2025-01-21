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
            ['id' => 1, 'name' => 'English', 'lang_code' => 'en-us'],
            ['id' => 2, 'name' => 'Afar', 'lang_code' => 'en-au'],
            ['id' => 3, 'name' => 'Abkhazian', 'lang_code' => 'en-ca'],
            ['id' => 4, 'name' => 'Afrikaans', 'lang_code' => 'es-pe'],
            ['id' => 5, 'name' => 'Amharic', 'lang_code' => 'en-uk'],
            ['id' => 6, 'name' => 'Arabic', 'lang_code' => 'en-in'],
            ['id' => 7, 'name' => 'Assamese', 'lang_code' => 'de-de'],
            ['id' => 8, 'name' => 'Aymara', 'lang_code' => 'fr-fr'],
            ['id' => 9, 'name' => 'Azerbaijani', 'lang_code' => 'it-ch'],
            ['id' => 10, 'name' => 'Bashkir', 'lang_code' => 'tr-tr'],
            ['id' => 11, 'name' => 'Belarusian', 'lang_code' => 'pt-pt'],
            ['id' => 12, 'name' => 'Bulgarian', 'lang_code' => 'pl-pl'],
            ['id' => 13, 'name' => 'Bihari', 'lang_code' => 'es-ar'],
            ['id' => 14, 'name' => 'Bislama', 'lang_code' => 'es-cl'],
            ['id' => 15, 'name' => 'Bengali/Bangla', 'lang_code' => 'es-co'],
            ['id' => 16, 'name' => 'Tibetan', 'lang_code' => 'es-es'],
            ['id' => 17, 'name' => 'Breton', 'lang_code' => 'es-us'],
            ['id' => 18, 'name' => 'Catalan', 'lang_code' => 'en-hk'],
            ['id' => 19, 'name' => 'Corsican', 'lang_code' => 'en-ie'],
            ['id' => 20, 'name' => 'Czech', 'lang_code' => 'en-il'],
            ['id' => 21, 'name' => 'Welsh', 'lang_code' => 'en-my'],
            ['id' => 22, 'name' => 'Danish', 'lang_code' => 'es-mx'],
            ['id' => 23, 'name' => 'German', 'lang_code' => 'en-nz'],
            ['id' => 24, 'name' => 'Bhutani', 'lang_code' => 'de-at'],
            ['id' => 25, 'name' => 'Greek', 'lang_code' => 'en-pk'],
            ['id' => 26, 'name' => 'Esperanto', 'lang_code' => 'en-ph'],
            ['id' => 27, 'name' => 'Spanish', 'lang_code' => 'de-ch'],
            ['id' => 28, 'name' => 'Estonian', 'lang_code' => 'en-sg'],
            ['id' => 29, 'name' => 'Basque', 'lang_code' => 'en-za'],
            ['id' => 30, 'name' => 'Persian', 'lang_code' => 'en-ae'],
            ['id' => 31, 'name' => 'Finnish', 'lang_code' => 'es-ve'],
            ['id' => 32, 'name' => 'Fiji', 'lang_code' => 'fr-ca'],
            ['id' => 33, 'name' => 'Faeroese', 'lang_code' => 'pt-br'],
            ['id' => 34, 'name' => 'French', 'lang_code' => 'fr-ch'],
            ['id' => 35, 'name' => 'Frisian', 'lang_code' => 'it-ch'],
            ['id' => 36, 'name' => 'Irish', 'lang_code' => 'es-ar'],
            ['id' => 37, 'name' => 'Scots/Gaelic', 'lang_code' => 'es-cl'],
            ['id' => 38, 'name' => 'Galician', 'lang_code' => 'es-co'],
            ['id' => 39, 'name' => 'Guarani', 'lang_code' => 'es-es'],
            ['id' => 40, 'name' => 'Gujarati', 'lang_code' => 'es-us'],
            ['id' => 41, 'name' => 'Hausa', 'lang_code' => 'en-hk'],
            ['id' => 42, 'name' => 'Hindi', 'lang_code' => 'en-ie'],
            ['id' => 43, 'name' => 'Croatian', 'lang_code' => 'en-il'],
            ['id' => 44, 'name' => 'Hungarian', 'lang_code' => 'en-my'],
            ['id' => 45, 'name' => 'Armenian', 'lang_code' => 'es-mx'],
            ['id' => 46, 'name' => 'Interlingua', 'lang_code' => 'en-nz'],
            ['id' => 47, 'name' => 'Interlingue', 'lang_code' => 'de-at'],
            ['id' => 48, 'name' => 'Inupiak', 'lang_code' => 'en-pk'],
            ['id' => 49, 'name' => 'Indonesian', 'lang_code' => 'en-ph'],
            ['id' => 50, 'name' => 'Icelandic', 'lang_code' => 'de-ch'],
            ['id' => 51, 'name' => 'Italian', 'lang_code' => 'en-sg'],
            ['id' => 52, 'name' => 'Hebrew', 'lang_code' => 'en-za'],
            ['id' => 53, 'name' => 'Japanese', 'lang_code' => 'en-ae'],
            ['id' => 54, 'name' => 'Yiddish', 'lang_code' => 'es-ve'],
            ['id' => 55, 'name' => 'Javanese', 'lang_code' => 'fr-ca'],
            ['id' => 56, 'name' => 'Georgian', 'lang_code' => 'pt-br'],
            ['id' => 57, 'name' => 'Kazakh', 'lang_code' => 'fr-ch'],
            ['id' => 58, 'name' => 'Greenlandic', 'lang_code' => 'it-ch'],
            ['id' => 59, 'name' => 'Cambodian', 'lang_code' => 'es-ar'],
            ['id' => 60, 'name' => 'Kannada', 'lang_code' => 'es-cl'],
            ['id' => 61, 'name' => 'Korean', 'lang_code' => 'es-co'],
            ['id' => 62, 'name' => 'Kashmiri', 'lang_code' => 'es-es'],
            ['id' => 63, 'name' => 'Kurdish', 'lang_code' => 'es-us'],
            ['id' => 64, 'name' => 'Kirghiz', 'lang_code' => 'en-hk'],
            ['id' => 65, 'name' => 'Latin', 'lang_code' => 'en-ie'],
            ['id' => 66, 'name' => 'Lingala', 'lang_code' => 'en-il'],
            ['id' => 67, 'name' => 'Laothian', 'lang_code' => 'en-my'],
            ['id' => 68, 'name' => 'Lithuanian', 'lang_code' => 'es-mx'],
            ['id' => 69, 'name' => 'Latvian/Lettish', 'lang_code' => 'en-nz'],
            ['id' => 70, 'name' => 'Malagasy', 'lang_code' => 'de-at'],
            ['id' => 71, 'name' => 'Maori', 'lang_code' => 'en-pk'],
            ['id' => 72, 'name' => 'Macedonian', 'lang_code' => 'en-ph'],
            ['id' => 73, 'name' => 'Malayalam', 'lang_code' => 'de-ch'],
            ['id' => 74, 'name' => 'Mongolian', 'lang_code' => 'en-sg'],
            ['id' => 75, 'name' => 'Moldavian', 'lang_code' => 'en-za'],
            ['id' => 76, 'name' => 'Marathi', 'lang_code' => 'en-ae'],
            ['id' => 77, 'name' => 'Malay', 'lang_code' => 'es-ve'],
            ['id' => 78, 'name' => 'Maltese', 'lang_code' => 'fr-ca'],
            ['id' => 79, 'name' => 'Burmese', 'lang_code' => 'pt-br'],
            ['id' => 80, 'name' => 'Nauru', 'lang_code' => 'fr-ch'],
            ['id' => 81, 'name' => 'Nepali', 'lang_code' => 'it-ch'],
            ['id' => 82, 'name' => 'Dutch', 'lang_code' => 'es-ar'],
            ['id' => 83, 'name' => 'Norwegian', 'lang_code' => 'es-cl']
        ];
        
             

        DB::table('languages')->insert($languages);
    }
}
