<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cookie;
use App;
use App\Models\{Category,SiteLanguages,CategoryTranslation};
use Illuminate\Support\Facades\Redirect;
class ViewController extends Controller
{
    
    public function home(){
        return view('User.home.index');
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
