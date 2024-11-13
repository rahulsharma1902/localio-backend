<?php 
use Illuminate\Support\Facades\Cookie;
use App\Models\{Category,SiteLanguages,CategoryTranslation,Filter,FilterOption,FilterTranslation,FilterOptionTranslation};
use DB;
if (!function_exists('getCurrentLocale')) {
    function getCurrentLocale() {
        return Cookie::get('language_code', config('app.locale'));
    }
}


if (!function_exists('getCurrentSiteLanguage')) {
    function getCurrentSiteLanguage() {
         $locale = Cookie::get('language_code', config('app.locale'));
         return SiteLanguages::where('handle', $locale)->first();
    }
}

if (!function_exists('getLanguageRole')) {
    function getLanguageRole() {
         $locale = Cookie::get('language_code', config('app.locale'));
         $siteLanguage = SiteLanguages::where('handle', $locale)->first();
         
         if ($siteLanguage && $siteLanguage->primary !== 1) {
            return $siteLanguage->handle;
         } else {
            return 'global';
         }
    }
}
