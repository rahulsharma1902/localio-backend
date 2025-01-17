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
        $lang_id = getCurrentLocale();
        // $lang_id = session()->get('lang_id');
        // dd($lang_id);
        if($lang_id){
            $homeContents = HomeContent::where('lang_id', $lang_id)->pluck('meta_value', 'meta_key');
        if($homeContents->isEmpty())
        {
            $homeContents = HomeContent::where('lang_id', '1')->pluck('meta_value', 'meta_key');
        }
        $translated_data =  CategoryTranslation::where('language_id',$lang_id)->get()->toArray()    ;
        if($translated_data){
            return view('User.home.index',compact('homeContents','translated_data'));
        }else{
        $translated_data =  CategoryTranslation::where('language_id',1)->get()->toArray();
        return view('User.home.index',compact('homeContents','translated_data'));
        }
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