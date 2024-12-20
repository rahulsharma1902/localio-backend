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
use App\Models\HomeContent;
class ViewController extends Controller
{
    
    public function home()
    {

        $langCode = getCurrentLocale(); 
        $homeContents = HomeContent::where('lang_code', $langCode)->pluck('meta_value', 'meta_key');
        if($homeContents->isEmpty())
        {
            // $homeContents = HomeContent::where('lang_code', 'en')->pluck('meta_value', 'meta_key');     
            $homeContents = HomeContent::where('lang_code', 'en')->pluck('meta_value', 'meta_key');     
          
        }
        return view('User.home.index',compact('homeContents'));
    }
    public function changeLanguage(Request $request, $langCode)
    {
        $availableLocales = SiteLanguages::where('status', 'active')->pluck('handle')->toArray();
        // Validate the language code
        if (!in_array($langCode, $availableLocales)) {
            $langCode = config('app.locale'); // Default locale if invalid
        }
        // Persist the language selection
        Session::put('current_lang', $langCode);
        Cookie::queue('language_code', $langCode, 60 * 24 * 30);
        app()->setLocale($langCode);
 
        // Redirect to the home page with the selected language
        $previousPath = Session::get('previous_path', '/'); // Default to home if no previous path
     
        // Redirect to the previous path with the selected language
        return redirect("/{$langCode}" . $previousPath)->with('success', 'Language changed successfully');
    }
    

}