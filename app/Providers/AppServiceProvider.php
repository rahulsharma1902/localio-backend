<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        $lang_code = getUserLocation();
        // App::setLocale($lang_code);
    }

  

 public function boot()
{
    // Check if the session has the 'locale' key, and if so, set it
    if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
    } else {
        // If no locale is set, default to 'en' (or your default language)
        App::setLocale('en');
    }
}

    
}
