<?php
use Illuminate\Support\Facades\Cookie;
use App\Models\{Category,Language,CategoryTranslation,Filter,FilterOption,FilterTranslation,FilterOptionTranslation};
use App\Services\TranslationService;
use App\Models\Country;
use App\Models\Log;

if (!function_exists('getCurrentLocale')) {
    function getCurrentLocale() {
        $lang_code = Cookie::get('lang_code', 'en-us');
        if(!$lang_code){
            $lang_code= session()->get($lang_code);
        }
        return $lang_code;
    }
}


if (!function_exists('getCurrentSiteLanguage')) {
    function getCurrentSiteLanguage() {
         $locale = Cookie::get('lang_code', config('app.locale'));
         return Language::where('lang_code', $locale)->first();
    }
}

if (!function_exists('getLanguageRole')) {
    function getLanguageRole() {
         $locale = Cookie::get('lang_code', config('app.locale'));
         $siteLanguage = Language::where('lang_code', $locale)->first();

         if ($siteLanguage && $siteLanguage->primary !== 1) {
            return $siteLanguage->handle;
         } else {
            return 'global';
         }
    }
}
if (!function_exists('formatInr')) {
    function formatInr($amount) {
        // Ensure the amount is a number
        $amount = (float) $amount;

        // Remove the decimals (if any)
        $amount = floor($amount);

        // Convert the amount to a string for manipulation
        $amount = (string)$amount;

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
}



function website_translator($logoName , $lang_code ){
    if($logoName=="") return "";
    try {
        $translationService = app(TranslationService::class);
        $translatedLogoName = $translationService->translate($logoName, $lang_code);
        // dd($translatedLogoName);
        return $translatedLogoName;
    } catch (\Exception $e) {
        saveLog('Language Translation Eroor','helpers',$e->getMessage());
    }
}





if (!function_exists('saveLog')) {

    function saveLog(
        $fileName = null,
        $message = null,
        $name = null,
        $payload = null,
        $isShowAdmin = false,
        $sentMail = false,
         $status = 'active'
    ) {
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
}


if(!function_exists('ip_location')){
    // function ip_location(){
    //     // dd(getCurrentLocale());
    //     $langCode = getCurrentLocale();
    //     // dd($lang_code);
    //     $ipdata = ip_location();
    //     $countrycode = strtolower($ipdata['geoplugin_countryCode']);
    //     if(Language::where('lang_code',getCurrentLocale().'-'.$countrycode)->exists()){
    //         $ip_langcode = getCurrentLocale().'-'.$countrycode;
    //         $lang_id = Language::where('lang_code' ,$ip_langcode)->value('id');
    //     }else{
    //         $ip_langcode = 'en'.'-'.'us';
    //         $lang_id = Language::where('lang_code' ,$ip_langcode)->value('id');
    //     }
    //     $country = $ipdata["geoplugin_countryName"];
    //     $country_id = Country::where('iso' ,$countrycode)->value('id');
    //     $user_country_data = [
    //         'lang_code' => $ip_langcode,
    //         'lang_id' => $lang_id,
    //         'country' => $country,
    //         'country_id' => $country_id
    //         ] ;

    //     session()->put('user_ip_data',$user_country_data);

    //     session()->get('user_ip_data')['lang_id'];
    //         return $user_country_data ;
    // }
}