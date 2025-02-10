<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Session;
use Illuminate\Support\Facades\Route;
class AddLocaleAutomatically
{
    public function handle(Request $request, Closure $next)
    {
        $validLocales = ['en-us']; 
        $firstSegment = $request->segment(1);
        if (!in_array($firstSegment, $validLocales)) {
            $defaultLocale = 'en-us';
            return redirect()->to("/$defaultLocale" . $request->getRequestUri());
        }
        App::setLocale($firstSegment);
        return $next($request);
    
    }
}
