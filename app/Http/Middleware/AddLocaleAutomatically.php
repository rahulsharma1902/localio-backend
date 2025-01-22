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
        $languages = getLanguages(true);
        $currentRoute = $request->route();
        $locale = $request->route('locale');
        if (!$locale || !in_array($locale, $languages)) {
            return redirect()->route($currentRoute->getName(), ['locale' => 'en-us']);
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
