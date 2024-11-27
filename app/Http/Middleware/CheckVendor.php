<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       
        // Ensure user is authenticated and is a vendor
        if (Auth::check() && Auth::user()->user_type === 'vendor') {
            return $next($request);
        }

        // If not a vendor, redirect to login or error page
        return redirect()->route('login')->with('error', 'You must be a vendor to access this page.');
    }
}
