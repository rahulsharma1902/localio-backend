<?php 
use Illuminate\Support\Facades\Cookie;

if (!function_exists('getCurrentLocale')) {
    function getCurrentLocale() {
        return Cookie::get('language_code', config('app.locale'));
    }
}
