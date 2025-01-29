<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use App;
use App\Models\{Category,SiteLanguages,CategoryTranslation, Product};
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
        $langCode = getCurrentLocale(); 
        $products = Product::latest()->take(2)->get();
        $lang_id = getCurrentLanguageID();
        $homeContents = HomeContent::where('lang_id', $lang_id)->pluck('meta_value', 'meta_key');
        if($homeContents->isEmpty())
        {
            $homeContents = HomeContent::where('lang_id', 1)->pluck('meta_value', 'meta_key');
        }
        $language_id = Language::where('lang_code',$langCode )->value('id');
        $translated_data =  CategoryTranslation::where('language_id',$lang_id)->get()->toArray();
        $homeContantImages = HomeContent::where('lang_id',1)
            ->whereIn('meta_key', ['header_background_img', 'header_img', 'trusted_brands_img', 'ai_section_left_img', 'ai_section_right_img', 'ai_send_img', 'review_section_right_img', 'review_section_left_img', 'find_tool_left_img', 'find_tool_right_img', 'user_reviews_img', 'price_compare_img', 'independent_img'])
            ->get()
            ->keyBy('meta_key'); 

        return view('User.home.index',compact('homeContents','translated_data','homeContantImages'));
        
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