<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cookie;
use App;
use App\Models\{Category,SiteLanguages,CategoryTranslation};
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Country;
use App\Models\Language;
use App\Models\HomeContent;
class ViewController extends Controller
{

    public function home()
    {
        // dd(ip_location());
        $langCode = getCurrentLocale();
        // $ipdata = ip_location();
        // $countrycode = strtolower($ipdata['geoplugin_countryCode']);
        // if(Language::where('lang_code',$langCode.'-'.$countrycode)->exists()){
        //     $ip_langcode = $langCode.'-'.$countrycode;
        //     $lang_id = Language::where('lang_code' ,$ip_langcode)->value('id');
        // }else{
        //     $ip_langcode = 'en'.'-'.'us';
        //     $lang_id = Language::where('lang_code' ,$ip_langcode)->value('id');
        // }
        // $country = $ipdata["geoplugin_countryName"];
        // $country_id = Country::where('iso' ,$countrycode)->value('id');
        // $user_country_data = [
        //     'lang_code' => $ip_langcode,
        //     'lang_id' => $lang_id,
        //     'country' => $country,
        //     'country_id' => $country_id
        //     ] ;

        // session()->put('user_ip_data',$user_country_data);

        // session()->get('user_ip_data')['lang_id'];
        $homeContents = HomeContent::where('lang_code', $langCode)->pluck('meta_value', 'meta_key');
        if($homeContents->isEmpty())
        {
            $homeContents = HomeContent::where('lang_code', 'en')->pluck('meta_value', 'meta_key');
        }
        return view('User.home.index',compact('homeContents'));
    }


    public function changeLanguage(Request $request, $lang_code)
    {
        $languages = getLanguages(true);
        $locale = $lang_code;
    
        // Get the current route
        $currentRoute = $request->route();
    
        // Check if the locale is valid or not in the allowed languages
        if (!$locale || !in_array($locale, $languages)) {
            // If not valid, redirect to the same route with 'en-us' as the locale
            return redirect()->route($currentRoute->getName(), ['locale' => 'en-us']);
        }
    
        // Set the application's locale
        app()->setLocale($locale);
    
        // Persist the language selection in session and cookie
        Session::put('current_lang', $lang_code);
        Cookie::queue('language_code', $lang_code, 60 * 24 * 30);
    
        // Redirect to the current route with the selected language
        return redirect()->route('home', ['locale' => $lang_code])
                         ->with('success', 'Language changed successfully');
    }
}