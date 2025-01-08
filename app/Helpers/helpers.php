<?php 
use Illuminate\Support\Facades\Cookie;
use App\Models\{Category,SiteLanguages,CategoryTranslation,Filter,FilterOption,FilterTranslation,FilterOptionTranslation};
use App\Services\TranslationService;
use App\Models\Log;

if (!function_exists('getCurrentLocale')) {
    function getCurrentLocale() {
        return Cookie::get('language_code', config('app.locale'));
    }
}


if (!function_exists('getCurrentSiteLanguage')) {
    function getCurrentSiteLanguage() {
         $locale = Cookie::get('language_code', config('app.locale'));
         return SiteLanguages::where('handle', $locale)->first();
    }
}

if (!function_exists('getLanguageRole')) {
    function getLanguageRole() {
         $locale = Cookie::get('language_code', config('app.locale'));
         $siteLanguage = SiteLanguages::where('handle', $locale)->first();
         
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
            'payload' => $payload,
            'is_show_admin' => $isShowAdmin,
            'sent_mail' => $sentMail,
            'status' => $status,
        ]);
    }
}



