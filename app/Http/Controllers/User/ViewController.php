<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cookie;
use App;
use App\Models\{Category,Language,CategoryTranslation};
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Country;
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
        $languages = Language::where('status', 'active')->get();
        // dd($languages);
        return view('User.home.index',compact('homeContents','languages'));
    }
    public function changeLanguage(Request $request, $langCode)
    {

        $availableLocales = Language::where('status', 'active')->pluck('lang_code')->toArray();
        // Validate the language code
        // dd($availableLocales);

        if (!in_array($langCode, $availableLocales)) {
            $langCode = config('app.locale'); // Default locale if invalid
        }
        // Persist the language selection
        Session::put('lang_code', $langCode);
        Cookie::queue('lang_code', $langCode, 60 * 24 * 30);
        app()->setLocale($langCode);

        // Redirect to the home page with the selected language

        $previousPath = Session::get('previous_path', '/'); // Default to home if no previous path
        return redirect()->back()->with('success', 'Language changed successfully');

        return redirect()->route('home.lang', ['langCode' => $langCode])->with('success', 'Language changed successfully');
}
}