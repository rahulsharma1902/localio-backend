<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    public function boot(Request $request )
    {
        // $languages = getLanguages();
        // View::share('languages', $languages);
        ini_set('max_execution_time', 120);
        ini_set('upload_max_filesize', '100M');
        ini_set('post_max_size', '120M');
        ini_set('max_execution_time', '300');
        ini_set('memory_limit', '512M');
    }
}
