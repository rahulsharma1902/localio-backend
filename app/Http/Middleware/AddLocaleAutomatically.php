<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Models\SiteLanguages;
use Session;
use Illuminate\Support\Facades\Route;
class AddLocaleAutomatically
{
    public function handle(Request $request, Closure $next)
    {
        // Get the list of available languages
        $languages = getLanguages(true);
    
        // Get the current route and the locale parameter
        $currentRoute = $request->route();
        $locale = $request->route('locale');
    
        // Check if the locale is not set or not in the allowed languages
        if (!$locale || !in_array($locale, $languages)) {
            // Redirect to the same route with 'en-us' as the locale
            return redirect()->route($currentRoute->getName(), ['locale' => 'en-us']);
        }
        // Set the application's locale
        app()->setLocale($locale);
        return $next($request);
    }
}
