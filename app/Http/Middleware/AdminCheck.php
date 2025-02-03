<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->user_type == 'admin') {
                $lang = Language::find(1)->lang_code;
                App::setLocale($lang);
                // dd($lang);
                return $next($request);
            } else {
                return redirect('/')->with('error', 'kindly login to open dashboard');
            }
        } else {
            // return redirect('/')->with('error','kindly login to open dashboard');
        }
    }
}
