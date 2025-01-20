<?php
use Illuminate\Support\Facades\Cookie;
use App\Models\{Category, Language,WebSetting,  CategoryTranslation, Filter, FilterOption, FilterTranslation, FilterOptionTranslation};
use App\Services\TranslationService;
use App\Models\Country;
use App\Models\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;


    function getCurrentLocale()
    {
        if(Cookie::get('lang_code')){
            $langcode = Cookie::get('lang_code');
        }elseif(Session::get('lang_code')){
            $langcode = Session::get('lang_code');
        } else {
            $langcode = "en-us";
        }
        return $langcode;
    }

    function getCurrentLanguageID()
    {
        if(Cookie::get('lang_code')){
            $langcode = Cookie::get('lang_code');
        }elseif(Session::get('lang_code')){
            $langcode = Session::get('lang_code');
        } else {
            $langcode = "en-us";
        }
        $siteLanguage = Language::where('lang_code', $langcode)->first();
        if($siteLanguage){
            return $siteLanguage->id;
        } 
        return 1;
    }


    function getCurrentSiteLanguage()
    {
        $locale = Cookie::get('lang_code', config('app.locale'));
        return Language::where('lang_code', $locale)->first();
    }


    function getLanguageRole()
    {
        $locale = Cookie::get('lang_code', config('app.locale'));
        $siteLanguage = Language::where('lang_code', $locale)->first();

        if ($siteLanguage && $siteLanguage->primary !== 1) {
            return $siteLanguage->handle;
        } else {
            return 'global';
        }
    }


    function formatInr($amount)
    {
        // Ensure the amount is a number
        $amount = (float) $amount;

        // Remove the decimals (if any)
        $amount = floor($amount);

        // Convert the amount to a string for manipulation
        $amount = (string) $amount;

        // Get the length of the amount
        $length = strlen($amount);

        // If the length is more than 3, start formatting from the 4th digit
        if ($length > 3) {
            // Split the last 3 digits
            $lastThree = substr($amount, -3);

            // Get the remaining part
            $remaining = substr($amount, 0, $length - 3);

            // Format the remaining part by adding commas every 2 digits
            $remaining = preg_replace('/(?<=\d)(?=(\d{2})+(?!\d))/', ',', $remaining);

            // Combine the two parts
            $formattedAmount = $remaining . ',' . $lastThree;
        } else {
            $formattedAmount = $amount;
        }

        return $formattedAmount;
    }

    function website_translator($logoName, $lang_code)
    {
        if ($logoName == "") {
            return "";
        }
        try {
            $translationService = app(TranslationService::class);
            $translatedLogoName = $translationService->translate($logoName, $lang_code);
            // dd($translatedLogoName);
            return $translatedLogoName;
        } catch (\Exception $e) {
            saveLog('Language Translation Eroor', 'helpers', $e->getMessage());
        }
    }
    function saveLog($fileName = null, $message = null, $name = null, $payload = [], $isShowAdmin = false, $sentMail = false, $status = 'active')
    {
        return Log::create([
            'file_name' => $fileName,
            'message' => $message,
            'name' => $name,
            'payload' => json_encode($payload),
            'is_show_admin' => $isShowAdmin,
            'sent_mail' => $sentMail,
            'status' => $status,
        ]);
    }


    function getUserLocation()
    {
        return 'en-us';
    }


    function getLanguages($codes = false)
    {
        $cacheKey = 'languages';
        $languages = Cache::get($cacheKey);
        if (!$languages) {
            $languages = Language::all();
            Cache::put($cacheKey, $languages, now()->addDay());
        }
        if ($codes) {
            $codes = $languages->pluck('lang_code')->toArray();
            return $codes;
        }
        return $languages;
    }


    function getWebSetting($key, $value = false)
    {
        $cacheKey = 'web_settings';
        $webSettings = Cache::get($cacheKey);
        if (!$webSettings) {
            $webSettings = WebSetting::all()->keyBy('key'); 
            Cache::put($cacheKey, $webSettings, now()->addDays(7));
        }

        if ($value) {
            if (isset($webSettings[$key])) {
                return $webSettings[$key]->value;
            } else {
                return null; 
            }
        }

        return $webSettings;
    }


    function storePrefrences($data)
    {
        $sessionTimeInDays = getWebSetting('USER_SESSION_LOGOUT_TIME', true);
        if (!$sessionTimeInDays) {
            $sessionTimeInDays = 30;
        }
        $minutes = $sessionTimeInDays * 24 * 60;
        Cookie::queue('userDetails', json_encode($data), $minutes);
        Session::put('userDetails', $data);
    }


    function detectLocation($ip = null,Request $request)
    {
        if (!$ip) {
            $ip = $request->ip();
        }

        $cacheKey = 'userDetails';
        $userDetails = Session::get('userDetails');

        if ($userDetails) {
            return $userDetails;
        }

        $userDetails = [
            'lang_code' => 'en-us',
            'lang_name' => 'United States - English',
            'lang_id' => 33,
        ];

        storePrefrences($userDetails);
        return $userDetails;
    }


    function getUserPrefrences(){
        $lang_code = getCurrentLocale();
        $language_id = Language::where('lang_code',$lang_code )->value('id');
        $translated_data =  CategoryTranslation::where('language_id',$language_id)->first();
        if(!$translated_data){
            $translated_data =  CategoryTranslation::where('language_id',1)->get()->toArray();
        }
        $lang_data = [
            'lang_id'=> $language_id,
            'translated_data' => $translated_data
        ];
        Session::put('lang_data',$lang_data);
        return $lang_data;
    }