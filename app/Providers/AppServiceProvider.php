<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

public function boot()
{
    // Set the locale based on user preferences or session
    if (session()->has('locale')) {
        App::setLocale(session('locale'));
    }
}

    
}
