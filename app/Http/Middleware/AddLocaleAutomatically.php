<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;

class AddLocaleAutomatically
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     
    public function handle(Request $request, Closure $next)
    {

        // Handle GET requests only
        if ($request->isMethod('get')) {
            // If there is no 'locale' in the route, check the cookie
            if (!$request->route('locale')) {
                // Check if language is set in the cookie
                $isLangSetInCookie = Cookie::get('language_code');
                // If the language is found in the cookie
                if ($isLangSetInCookie) {
                    // Set the application locale
                    App::setLocale($isLangSetInCookie);

                    // Avoid redirect loops by checking if the current URL already contains the language
                    if (!str_contains($request->getRequestUri(), $isLangSetInCookie)) {
                        // Redirect the user to the same URL, but with the language code as a prefix
                        return redirect('/' . $isLangSetInCookie . $request->getRequestUri());
                    }
                } else {
                    $userIp = request()->ip();
                    $userIPDetails = [];
                    $ipDetails = getIpDetails($userIp);
            
                    $isLangSetInCookie = session()->get('language_code');
                    App::setLocale($isLangSetInCookie);
                    if (!str_contains($request->getRequestUri(), $isLangSetInCookie)) {
                        // Redirect the user to the same URL, but with the language code as a prefix
                        return redirect('/' . $isLangSetInCookie . $request->getRequestUri());
                    }
                }
            } else {
                
                $isLangSetInCookie = Cookie::get('language_code');
                $isLangSetInCookie='en';
                App::setLocale($isLangSetInCookie);
                if (!str_contains($request->getRequestUri(), $isLangSetInCookie)) {
                    return redirect('/' . $isLangSetInCookie);
                }
            }
           
        }

        // Continue with the request after setting the language
        return $next($request);
    }
}

