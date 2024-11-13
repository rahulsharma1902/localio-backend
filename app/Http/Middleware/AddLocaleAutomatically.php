<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Models\SiteLanguages;

class AddLocaleAutomatically
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
{
    if ($request->isMethod('get')) {
        // Retrieve an array of all active language handles
        $availableLocales = SiteLanguages::where('status', 'active')->pluck('handle')->toArray();

        // Retrieve the default language handle
        $defaultlanguage = SiteLanguages::where('primary', 1)->value('handle');

        $locale = $request->route('locale') ?? Cookie::get('language_code') ?? $defaultlanguage ?? config('app.locale');

        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }

        // Log locale setting
        Log::info("Setting locale to: {$locale}");

        App::setLocale($locale);
        Cookie::queue('language_code', $locale, 60 * 24 * 30);

        if (!$request->route('locale') || $request->route('locale') !== $locale) {
            return redirect("/{$locale}" . $request->getRequestUri());
        }
    }

    return $next($request);
}



}
