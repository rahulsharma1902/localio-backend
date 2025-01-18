<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use App;
use App\Models\{Category,Language,CategoryTranslation};
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Country;
<<<<<<< HEAD
=======
use App\Models\Language;
use Illuminate\Support\Facades\Session;
>>>>>>> a1857a8a0916a5dfe88205074a4bf5456659607e
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
<<<<<<< HEAD
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
=======
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
>>>>>>> a1857a8a0916a5dfe88205074a4bf5456659607e
}