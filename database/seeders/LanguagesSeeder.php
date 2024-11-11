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
            ['id' => 1, 'name' => 'English', 'iso_639-1' => 'en'],
            ['id' => 2, 'name' => 'Afar', 'iso_639-1' => 'aa'],
            ['id' => 3, 'name' => 'Abkhazian', 'iso_639-1' => 'ab'],
            ['id' => 4, 'name' => 'Afrikaans', 'iso_639-1' => 'af'],
            ['id' => 5, 'name' => 'Amharic', 'iso_639-1' => 'am'],
            ['id' => 6, 'name' => 'Arabic', 'iso_639-1' => 'ar'],
            ['id' => 7, 'name' => 'Assamese', 'iso_639-1' => 'as'],
            ['id' => 8, 'name' => 'Aymara', 'iso_639-1' => 'ay'],
            ['id' => 9, 'name' => 'Azerbaijani', 'iso_639-1' => 'az'],
            ['id' => 10, 'name' => 'Bashkir', 'iso_639-1' => 'ba'],
            ['id' => 11, 'name' => 'Belarusian', 'iso_639-1' => 'be'],
            ['id' => 12, 'name' => 'Bulgarian', 'iso_639-1' => 'bg'],
            ['id' => 13, 'name' => 'Bihari', 'iso_639-1' => 'bh'],
            ['id' => 14, 'name' => 'Bislama', 'iso_639-1' => 'bi'],
            ['id' => 15, 'name' => 'Bengali/Bangla', 'iso_639-1' => 'bn'],
            ['id' => 16, 'name' => 'Tibetan', 'iso_639-1' => 'bo'],
            ['id' => 17, 'name' => 'Breton', 'iso_639-1' => 'br'],
            ['id' => 18, 'name' => 'Catalan', 'iso_639-1' => 'ca'],
            ['id' => 19, 'name' => 'Corsican', 'iso_639-1' => 'co'],
            ['id' => 20, 'name' => 'Czech', 'iso_639-1' => 'cs'],
            ['id' => 21, 'name' => 'Welsh', 'iso_639-1' => 'cy'],
            ['id' => 22, 'name' => 'Danish', 'iso_639-1' => 'da'],
            ['id' => 23, 'name' => 'German', 'iso_639-1' => 'de'],
            ['id' => 24, 'name' => 'Bhutani', 'iso_639-1' => 'dz'],
            ['id' => 25, 'name' => 'Greek', 'iso_639-1' => 'el'],
            ['id' => 26, 'name' => 'Esperanto', 'iso_639-1' => 'eo'],
            ['id' => 27, 'name' => 'Spanish', 'iso_639-1' => 'es'],
            ['id' => 28, 'name' => 'Estonian', 'iso_639-1' => 'et'],
            ['id' => 29, 'name' => 'Basque', 'iso_639-1' => 'eu'],
            ['id' => 30, 'name' => 'Persian', 'iso_639-1' => 'fa'],
            ['id' => 31, 'name' => 'Finnish', 'iso_639-1' => 'fi'],
            ['id' => 32, 'name' => 'Fiji', 'iso_639-1' => 'fj'],
            ['id' => 33, 'name' => 'Faeroese', 'iso_639-1' => 'fo'],
            ['id' => 34, 'name' => 'French', 'iso_639-1' => 'fr'],
            ['id' => 35, 'name' => 'Frisian', 'iso_639-1' => 'fy'],
            ['id' => 36, 'name' => 'Irish', 'iso_639-1' => 'ga'],
            ['id' => 37, 'name' => 'Scots/Gaelic', 'iso_639-1' => 'gd'],
            ['id' => 38, 'name' => 'Galician', 'iso_639-1' => 'gl'],
            ['id' => 39, 'name' => 'Guarani', 'iso_639-1' => 'gn'],
            ['id' => 40, 'name' => 'Gujarati', 'iso_639-1' => 'gu'],
            ['id' => 41, 'name' => 'Hausa', 'iso_639-1' => 'ha'],
            ['id' => 42, 'name' => 'Hindi', 'iso_639-1' => 'hi'],
            ['id' => 43, 'name' => 'Croatian', 'iso_639-1' => 'hr'],
            ['id' => 44, 'name' => 'Hungarian', 'iso_639-1' => 'hu'],
            ['id' => 45, 'name' => 'Armenian', 'iso_639-1' => 'hy'],
            ['id' => 46, 'name' => 'Interlingua', 'iso_639-1' => 'ia'],
            ['id' => 47, 'name' => 'Interlingue', 'iso_639-1' => 'ie'],
            ['id' => 48, 'name' => 'Inupiak', 'iso_639-1' => 'ik'],
            ['id' => 49, 'name' => 'Indonesian', 'iso_639-1' => 'in'],
            ['id' => 50, 'name' => 'Icelandic', 'iso_639-1' => 'is'],
            ['id' => 51, 'name' => 'Italian', 'iso_639-1' => 'it'],
            ['id' => 52, 'name' => 'Hebrew', 'iso_639-1' => 'iw'],
            ['id' => 53, 'name' => 'Japanese', 'iso_639-1' => 'ja'],
            ['id' => 54, 'name' => 'Yiddish', 'iso_639-1' => 'ji'],
            ['id' => 55, 'name' => 'Javanese', 'iso_639-1' => 'jw'],
            ['id' => 56, 'name' => 'Georgian', 'iso_639-1' => 'ka'],
            ['id' => 57, 'name' => 'Kazakh', 'iso_639-1' => 'kk'],
            ['id' => 58, 'name' => 'Greenlandic', 'iso_639-1' => 'kl'],
            ['id' => 59, 'name' => 'Cambodian', 'iso_639-1' => 'km'],
            ['id' => 60, 'name' => 'Kannada', 'iso_639-1' => 'kn'],
            ['id' => 61, 'name' => 'Korean', 'iso_639-1' => 'ko'],
            ['id' => 62, 'name' => 'Kashmiri', 'iso_639-1' => 'ks'],
            ['id' => 63, 'name' => 'Kurdish', 'iso_639-1' => 'ku'],
            ['id' => 64, 'name' => 'Kirghiz', 'iso_639-1' => 'ky'],
            ['id' => 65, 'name' => 'Latin', 'iso_639-1' => 'la'],
            ['id' => 66, 'name' => 'Lingala', 'iso_639-1' => 'ln'],
            ['id' => 67, 'name' => 'Laothian', 'iso_639-1' => 'lo'],
            ['id' => 68, 'name' => 'Lithuanian', 'iso_639-1' => 'lt'],
            ['id' => 69, 'name' => 'Latvian/Lettish', 'iso_639-1' => 'lv'],
            ['id' => 70, 'name' => 'Malagasy', 'iso_639-1' => 'mg'],
            ['id' => 71, 'name' => 'Maori', 'iso_639-1' => 'mi'],
            ['id' => 72, 'name' => 'Macedonian', 'iso_639-1' => 'mk'],
            ['id' => 73, 'name' => 'Malayalam', 'iso_639-1' => 'ml'],
            ['id' => 74, 'name' => 'Mongolian', 'iso_639-1' => 'mn'],
            ['id' => 75, 'name' => 'Moldavian', 'iso_639-1' => 'mo'],
            ['id' => 76, 'name' => 'Marathi', 'iso_639-1' => 'mr'],
            ['id' => 77, 'name' => 'Malay', 'iso_639-1' => 'ms'],
            ['id' => 78, 'name' => 'Maltese', 'iso_639-1' => 'mt'],
            ['id' => 79, 'name' => 'Burmese', 'iso_639-1' => 'my'],
            ['id' => 80, 'name' => 'Nauru', 'iso_639-1' => 'na'],
            ['id' => 81, 'name' => 'Nepali', 'iso_639-1' => 'ne'],
            ['id' => 82, 'name' => 'Dutch', 'iso_639-1' => 'nl'],
            ['id' => 83, 'name' => 'Norwegian', 'iso_639-1' => 'no'],
            ['id' => 84, 'name' => 'Occitan', 'iso_639-1' => 'oc'],
            ['id' => 85, 'name' => 'Oromo/Afan', 'iso_639-1' => 'om'],
            ['id' => 86, 'name' => 'Oriya', 'iso_639-1' => 'or'],
            ['id' => 87, 'name' => 'Punjabi', 'iso_639-1' => 'pa'],
            ['id' => 88, 'name' => 'Polish', 'iso_639-1' => 'pl'],
            ['id' => 89, 'name' => 'Pashto/Pushto', 'iso_639-1' => 'ps'],
            ['id' => 90, 'name' => 'Portuguese', 'iso_639-1' => 'pt'],
            ['id' => 91, 'name' => 'Quechua', 'iso_639-1' => 'qu'],
            ['id' => 92, 'name' => 'Rhaeto-Romance', 'iso_639-1' => 'rm'],
            ['id' => 93, 'name' => 'Kirundi', 'iso_639-1' => 'rn'],
            ['id' => 94, 'name' => 'Romanian', 'iso_639-1' => 'ro'],
            ['id' => 95, 'name' => 'Russian', 'iso_639-1' => 'ru'],
            ['id' => 96, 'name' => 'Kinyarwanda', 'iso_639-1' => 'rw'],
            ['id' => 97, 'name' => 'Sanskrit', 'iso_639-1' => 'sa'],
            ['id' => 98, 'name' => 'Sindhi', 'iso_639-1' => 'sd'],
            ['id' => 99, 'name' => 'Sangro', 'iso_639-1' => 'sg'],
            ['id' => 100, 'name' => 'Serbo-Croatian', 'iso_639-1' => 'sh'],
            ['id' => 101, 'name' => 'Sinhalese', 'iso_639-1' => 'si'],
            ['id' => 102, 'name' => 'Slovak', 'iso_639-1' => 'sk'],
            ['id' => 103, 'name' => 'Slovenian', 'iso_639-1' => 'sl'],
            ['id' => 104, 'name' => 'Samoan', 'iso_639-1' => 'sm'],
            ['id' => 105, 'name' => 'Shona', 'iso_639-1' => 'sn'],
            ['id' => 106, 'name' => 'Somali', 'iso_639-1' => 'so'],
            ['id' => 107, 'name' => 'Albanian', 'iso_639-1' => 'sq'],
            ['id' => 108, 'name' => 'Serbian', 'iso_639-1' => 'sr'],
            ['id' => 109, 'name' => 'Siswati', 'iso_639-1' => 'ss'],
            ['id' => 110, 'name' => 'Sesotho', 'iso_639-1' => 'st'],
            ['id' => 111, 'name' => 'Sundanese', 'iso_639-1' => 'su'],
            ['id' => 112, 'name' => 'Swedish', 'iso_639-1' => 'sv'],
            ['id' => 113, 'name' => 'Swahili', 'iso_639-1' => 'sw'],
            ['id' => 114, 'name' => 'Tamil', 'iso_639-1' => 'ta'],
            ['id' => 115, 'name' => 'Telugu', 'iso_639-1' => 'te'],
            ['id' => 116, 'name' => 'Tajik', 'iso_639-1' => 'tg'],
            ['id' => 117, 'name' => 'Thai', 'iso_639-1' => 'th'],
            ['id' => 118, 'name' => 'Tigrinya', 'iso_639-1' => 'ti'],
            ['id' => 119, 'name' => 'Turkmen', 'iso_639-1' => 'tk'],
            ['id' => 120, 'name' => 'Tagalog', 'iso_639-1' => 'tl'],
            ['id' => 121, 'name' => 'Setswana', 'iso_639-1' => 'tn'],
            ['id' => 122, 'name' => 'Tonga', 'iso_639-1' => 'to'],
            ['id' => 123, 'name' => 'Turkish', 'iso_639-1' => 'tr'],
            ['id' => 124, 'name' => 'Tsonga', 'iso_639-1' => 'ts'],
            ['id' => 125, 'name' => 'Tatar', 'iso_639-1' => 'tt'],
            ['id' => 126, 'name' => 'Twi', 'iso_639-1' => 'tw'],
            ['id' => 127, 'name' => 'Ukrainian', 'iso_639-1' => 'uk'],
            ['id' => 128, 'name' => 'Urdu', 'iso_639-1' => 'ur'],
            ['id' => 129, 'name' => 'Uzbek', 'iso_639-1' => 'uz'],
            ['id' => 130, 'name' => 'Vietnamese', 'iso_639-1' => 'vi'],
            ['id' => 131, 'name' => 'Volapuk', 'iso_639-1' => 'vo'],
            ['id' => 132, 'name' => 'Wolof', 'iso_639-1' => 'wo'],
            ['id' => 133, 'name' => 'Xhosa', 'iso_639-1' => 'xh'],
            ['id' => 134, 'name' => 'Yoruba', 'iso_639-1' => 'yo'],
            ['id' => 135, 'name' => 'Chinese', 'iso_639-1' => 'zh'],
            ['id' => 136, 'name' => 'Zulu', 'iso_639-1' => 'zu']
        ];

        DB::table('languages')->insert($languages);
    }
}
