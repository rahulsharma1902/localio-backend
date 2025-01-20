<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Language;
use App\Models\CategoryTranslation;
use Illuminate\Support\Str;



class TranslateWebsiteContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:translate-website-content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translate the website in all the languages.';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        saveLog('lamnguiage');

        $languages = Language::where('is_active_translation', 1)
            ->where('is_valid_language_code', 1)
            ->get();
    
        $categories = Category::all();
    
        foreach ($categories as $category) {
            saveLog($category->name);
        
            foreach ($languages as $language) {
              $translationExists = CategoryTranslation::where([['category_id',$category->id],['language_id',$language->id]])->exists();
              if (!$translationExists) {
                    // saveLog($language->id);
            
                    $translatedName = website_translator($category->name, $language->lang_code); // Translated name
                    $translatedDescription = website_translator($category->description, $language->lang_code); // Translated description
            
                    CategoryTranslation::create([
                        'category_id' => $category->id,
                        'language_id' => $language->id,
                        'name' => $translatedName,
                        'description' => $translatedDescription,
                        'slug' => Str::slug($translatedName), // Generate slug dynamically
                    ]);
                }
            }
        }
    }
}
