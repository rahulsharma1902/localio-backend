<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use App;
use App\Models\{Category,SiteLanguages,CategoryTranslation};
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Support\Facades\Session;
use App\Models\HomeContent;
use Illuminate\Support\Facades\Auth;
class ViewController extends Controller
{

    public function home()
    {
        // dd(ip_location());
        $langCode = getCurrentLocale();
        // dd($langCode);
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
        $language_id = Language::where('lang_code',$langCode )->value('id');
        $translated_data =  CategoryTranslation::where('language_id',$language_id)->get()->toArray()    ;
        if($translated_data){
            // dd($translated_data);
            return view('User.home.index',compact('homeContents','translated_data'));
        }else{
        $translated_data =  CategoryTranslation::where('language_id',1)->get()->toArray();
        return view('User.home.index',compact('homeContents','translated_data'));
        }

        
    }

    public function changeLanguage(Request $request, $lang_code)
    {

        $cacheKey="userDetails";
        $languages = getLanguages();
        $languageRecord = $languages->firstWhere('lang_code', $lang_code); 
        if (!$languageRecord) {
            $lang_code = 'en-us';
            $languageRecord = $languages->firstWhere('lang_code', $lang_code); // Fetch the default language record
        }
        $userDetails = [
            'lang_code' => $languageRecord->lang_code,
            'lang_name' => $languageRecord->name,
            'lang_id' => $languageRecord->id,
        ];
                

        storePrefrences($userDetails);
        $currentRoute = $request->route();
        return redirect()->route('home', ['locale' => $lang_code])
        ->with('success', 'Language changed successfully');
    }
}