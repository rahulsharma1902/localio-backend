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
// public function handle(Request $request, Closure $next)
// {
//     if ($request->isMethod('get')) {

//         // Retrieve all active language codes
//         $availableLocales = SiteLanguages::where('status', 'active')->pluck('handle')->toArray();

//         // Get the default language handle
//         $defaultLanguage = SiteLanguages::where('primary', 1)->value('handle') ?? config('app.locale');
 
//         // Get the locale from the URL
//         $urlLocale = $request->route('locale');
   
//         // // store previous path 

//         if ($urlLocale) {
//             // Get the full URL path, remove the language code part, and store the rest
//             $previousPath = substr($request->getRequestUri(), strlen("/{$urlLocale}"));
//             Session::put('previous_path', $previousPath);
//         }
//         // Determine the locale
//         $locale = $urlLocale && in_array($urlLocale, $availableLocales)
//             ? $urlLocale // Use the locale from the URL if valid
//             : (Session::get('current_lang') // Fallback to the session-stored locale
//                 ?? Cookie::get('language_code') // Fallback to the cookie-stored locale
//                 ?? $defaultLanguage); // Fallback to the default language

//         // Validate the locale
//         if (!in_array($locale, $availableLocales)) {
//             $locale = $defaultLanguage;
//         }

//         // If the user entered a valid locale in the URL, update session and cookie
//         if ($urlLocale && $urlLocale !== Session::get('current_lang')) {
//             Session::put('current_lang', $urlLocale);
//             Cookie::queue('language_code', $urlLocale, 60 * 24 * 30); // Persist in cookies for 30 days
//         }

//         // Set the application locale
//         app()->setLocale($locale);

//         // Get the path without the locale
//         $pathWithoutLocale = $request->path();
//         $segments = explode('/', $pathWithoutLocale);

//         // Remove any duplicate or invalid locale in the path
//         if (in_array($segments[0], $availableLocales)) {
//             array_shift($segments); // Remove the first segment if it is a locale
//         }
//         $pathWithoutLocale = implode('/', $segments);

//         // Redirect if the locale in the URL doesn't match the determined locale
//         if (!$urlLocale || $urlLocale !== $locale) {
//             return redirect("/{$locale}/{$pathWithoutLocale}");
//         }
//     }
//     return $next($request);
// }

public function handle(Request $request, Closure $next)
{
    // Check if the route has the 'AddLocaleAutomatically' middleware
    $currentRoute = $request->route();
    $routeMiddleware = $currentRoute ? $currentRoute->gatherMiddleware() : [];

    if ($request->isMethod('get') && in_array('AddLocaleAutomatically', $routeMiddleware)) {
        $availableLocales = SiteLanguages::where('status', 'active')->pluck('handle')->toArray();
        $defaultLanguage = SiteLanguages::where('primary', 1)->value('handle') ?? config('app.locale');
        $urlLocale = $request->route('locale');

        if ($urlLocale) {
            $previousPath = substr($request->getRequestUri(), strlen("/{$urlLocale}"));
            Session::put('previous_path', $previousPath);
        }

        // Determine the current locale
        $locale = $urlLocale && in_array($urlLocale, $availableLocales)
            ? $urlLocale
            : (Session::get('current_lang')
                ?? Cookie::get('lang_code')
                ?? $defaultLanguage);

        // Fallback to default if locale is invalid
        if (!in_array($locale, $availableLocales)) {
            $locale = $defaultLanguage;
        }

        // Update session and cookie if locale changes
        if ($urlLocale !== $locale) {
            Session::put('current_lang', $locale);
            Cookie::queue('lang_code', $locale, 60 * 24 * 30); // 30-day expiration
        }

        // Set the application's locale
        app()->setLocale($locale);

        // Reconstruct the path without the locale prefix
        $pathWithoutLocale = $request->path();
        $segments = explode('/', $pathWithoutLocale);

        if (in_array($segments[0], $availableLocales)) {
            array_shift($segments);
        }
        $pathWithoutLocale = implode('/', $segments);

        // Redirect to ensure the correct locale is applied in the URL
        if (!$urlLocale || $urlLocale !== $locale) {
            return redirect("/{$locale}/{$pathWithoutLocale}");
        }
    }

    return $next($request);
}


}
