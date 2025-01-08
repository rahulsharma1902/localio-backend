<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Language;
use App\Models\CategoryTranslation;



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
        
        $languages = Language::where('is_active_translation', 1)
        ->where('is_valid_language_code', 1)
        ->get();

        $categories = Category::all();


        
    }
}
