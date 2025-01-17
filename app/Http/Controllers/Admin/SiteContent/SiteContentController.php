<?php

namespace App\Http\Controllers\Admin\SiteContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderContent;
use Illuminate\Support\Facades\File;
use App\Models\FooterContent;
use App\Models\HomeContent;
use App\Models\HomeContentMedia;
use App\Models\CategoryPageContent;
use App\Models\TopProductContent;
use App\Models\SiteLanguages;
use Session;
class SiteContentController extends Controller
{
    public function homeContent()
    {
        $lang = getCurrentLocale();  
        if(session()->has('lang_code')){
            $lang = session()->get('lang_code');
        }
        $allHomeContents = homeContent::where('lang_code', $lang)->get();
        if ($allHomeContents->isEmpty()) {
            $englishHomeContents = homeContent::where('lang_code', 'en')->get();
            foreach ($englishHomeContents as $content) {
                $newHomeContent = new homeContent;
                $newHomeContent->meta_key = $content->meta_key;
                $newHomeContent->meta_value = $content->meta_value;
                $newHomeContent->lang_code = $lang;  
                $newHomeContent->type = $content->type;  
                $newHomeContent->save();
            }
            $allHomeContents = homeContent::where('lang_code', $lang)->get();
        }
        
        return view('Admin.site-content.home_page', compact('allHomeContents'));
    }
    public function updateLangFile(Request $request)
    {
        $textVal = $request->data['textVal'];
        $textID = $request->data['textID'];
        $admin_lang = getCurrentLocale();

        $filepath = base_path('resources/lang/' . $admin_lang . '/home.php');

        if (!File::exists($filepath)) {
            return response()->json(['error' => 'Language file not found.'], 404);
        }

        $content = File::get($filepath);

        $pattern = "/'$textID'\s*=>\s*'(.*?)'/"; 
        $replacement = "'$textID' => '" . addslashes($textVal) . "'"; 
    

        if (!preg_match($pattern, $content)) {

            $content = preg_replace("/\];/", "    '$textID' => '" . addslashes($textVal) . "',\n];", $content);
        } else {

            $content = preg_replace($pattern, $replacement, $content);
        }
 
        File::put($filepath, $content);

        return response()->json(['success' => 'Localization updated successfully.'], 200);

    }

    public function homeContentUpdate(Request $request)
    {
        $this->uploadImages($request, 'ai_send_img');
        $this->uploadImages($request, 'header_image');
        $this->uploadImages($request, 'header_backgound_image');
        $this->uploadImages($request, 'ai_left_image');
        $this->uploadImages($request, 'ai_right_image');
        $this->uploadImages($request, 'review_section_right_img');
        $this->uploadImages($request, 'review_section_left_img');
        $this->uploadImages($request, 'find_tool_left_image');
        $this->uploadImages($request, 'find_tool_right_image');
        $this->uploadImages($request, 'verified_reviews_image');
        $this->uploadImages($request, 'feature_price_image');
        $this->uploadImages($request, 'independ_image');
        $this->uploadBrandImages($request);
        $textFields = [
            'header_title',
            'header_description',
            'placeholder_text',
            'trusted_brand',
            'most_popular',
            'campare_business',
            'visit_website',
            'exclusive_deals',
            'all_exclusive',
            'get_this_deal',
            'ai_title',
            'ai_description',
            'ai_placeholder',
            'top_product',
            'all_top_product',
            'latest_reviews',
            'write_review',
            'read_article',
            'view_all_article',
            'find_tool',
            'verify_user_review',
            'verify_review_description',
            'feature_price',
            'feature_price_description',
            'independent',
            'independent_description',
            'get_button_lable'
        ];
    
        foreach ($textFields as $field) {
            if ($request->has($field) && is_array($request->get($field))) {
                $data = $request->get($field);  // The data array for each text field
                foreach ($data as $id => $value) {
                    $homeContent = HomeContent::find($id);
                    if ($homeContent) {
                        $homeContent->update([
                            'meta_value' => $value,  // Update the meta_value for the respective content
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Home content updated successfully.');
    }

    private function uploadImages(Request $request, $imageField)
    {
        if ($request->hasFile($imageField) && is_array($request->file($imageField))) {
            foreach ($request->file($imageField) as $id => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($imageField), $fileName);

                $homeContent = HomeContent::find($id);
                if ($homeContent) {
                    $homeContent->update([
                        'meta_value' => $imageField . '/' . $fileName,
                    ]);
                }
            }
        }
    }

    private function uploadBrandImages(Request $request)
    {
        if ($request->has('brand_image')) {
            foreach ($request->brand_image as $contentId => $files) {
                $content = HomeContent::find($contentId);
                if ($content && !empty($files)) {
                    $imageIds = [];
                    foreach ($files as $file) {
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('brand_image'), $fileName);

                        $media = new HomeContentMedia;
                        $media->home_content_id = $content->id;
                        $media->file_path = 'brand_image/' . $fileName;
                        $media->file_name = $fileName;
                        $media->save();

                        $imageIds[] = $media->id;
                    }

                    // Update with the image IDs
                    $content->update([
                        'meta_value' => json_encode($imageIds),
                    ]);
                }
            }
        }
    }

    public function headerPage()
    {
        // $headerContents = HeaderContent::all();
        $lang = getCurrentLocale();
        if(session()->has('lang_code')){
            $lang = session()->get('lang_code');
        }
        $headerContents = HeaderContent::where('lang_code',$lang)->get();

        if ($headerContents->isEmpty()) {
            $englishHeaderContents = HeaderContent::where('lang_code', 'en')->get();
            if($englishHeaderContents)
            {
                foreach ($englishHeaderContents as $content) {
                    $HeaderContent = new HeaderContent;
                    $HeaderContent->meta_key = $content->meta_key;
                    $HeaderContent->meta_value = $content->meta_value;
                    $HeaderContent->lang_code = $lang;  
                    $HeaderContent->type = $content->type;  
                    $HeaderContent->save();
                }
            }
            $headerContents = HeaderContent::where('lang_code', $lang)->get();
        }
        return view('Admin.site-content.header_page',compact('headerContents'));
    }
    public function headerContentUpdate(Request $request)
    {
        
        $this->updateHeaderMetaValues($request, 'header_logo');
        $textFields = [
            'header_search_placeholder',
            'login_btn_lable',
            'sign_up_btn_lable',
            'sign_out_btn_lable',
            'exclusive',
            'categories',
            'top_rated_product',
            'expert_guide',
            'help_center',
            'header_logo',
        ];

        foreach($textFields as $field)
        {
            if($request->has($field) && is_array($request->get($field))) {
               $data = $request->get($field);
               foreach($data as $id => $val){
                $headerContent = HeaderContent::find($id);
                    if ($headerContent) {
                        $headerContent->update([
                            'meta_value' => $val,  // Update the meta_value for the respective content
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'Header content updated successfully.');
    }
    private function updateHeaderMetaValues(Request $request, $imageField)
    {
        if ($request->hasFile($imageField) && is_array($request->file($imageField))) {
            
            foreach ($request->file($imageField) as $id => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($imageField), $fileName);

                $homeContent = HeaderContent::find($id);
                if ($homeContent) {
                    $homeContent->update([
                        'meta_value' => $imageField . '/' . $fileName,
                    ]);
                }
            }
        }
    }
  
    public function footerPage()
    {
        $lang = getCurrentLocale();
        if(session()->has('lang_code')){
            $lang = session()->get('lang_code');
        }
        $footerContents = FooterContent::where('lang_code',$lang)->get();
        if ($footerContents->isEmpty()) {
            $englishFooterContents = FooterContent::where('lang_code', 'en')->get();
            if($englishFooterContents)
            {
                foreach ($englishFooterContents as $content) {
                    $footerContents = new FooterContent;
                    $footerContents->meta_key = $content->meta_key;
                    $footerContents->meta_value = $content->meta_value;
                    $footerContents->lang_code = $lang;  
                    $footerContents->type = $content->type;  
                    $footerContents->save();
                }
            }
            $footerContents = FooterContent::where('lang_code', $lang)->get();
        }

        return view('Admin.site-content.footer_page',compact('footerContents'));
    }
    public function footerPageUpdate(Request $request)
    {   
  
            $this->uploadImagesFooter($request, 'footer_logo');
            $this->uploadImagesFooter($request, 'facebook_icon');
            $this->uploadImagesFooter($request, 'instagram_icon');
            $this->uploadImagesFooter($request, 'twitter_icon');
            $textFields = 
            [
                'discover',
                'categories',
                'top_rated_product',
                'exclusive_deal',
                'company',
                'who_we_are',
                'privacy_policy',
                'terms_and_conditions',
                'vendors',
                'get_listed',
                'vendor_login',
                'help',
                'expert_guides',
                'help_center',
                'contact',
                'follow_us',
                'facebook_url',
                'instagram_url',
                'twitter_url',
                'facebook',
                'instagram',
                'twitter',
            ];
            foreach($textFields as $field)
            {   
                if($request->has($field)){
                    $data = $request->get($field);
                    foreach($data as $key=>$val){
                        $footerContent = FooterContent::find($key);
                        if($footerContent){
                            $footerContent->update([
                                'meta_value'  =>$val,
                            ]);
                        }
                    }
                }
            }
            return redirect()->back()->with('success', 'Footer content updated successfully.');
    }
    private function uploadImagesFooter(Request $request, $imageField)
    {
        if ($request->hasFile($imageField)) {
            foreach ($request->file($imageField) as $id => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($imageField), $fileName);

                $homeContent = FooterContent::find($id);
                if ($homeContent) {
                    $homeContent->update([
                        'meta_value' => $imageField . '/' . $fileName,
                    ]);
                }
            }
        }
    }

    public function categoriesPage()
    {
        $lang = getCurrentLocale();
        if(session()->has('lang_code')){
            $lang = session()->get('lang_code');
        }
        $categoryPageContents = CategoryPageContent::where('lang_code',$lang)->get();
        if ($categoryPageContents->isEmpty()) {
            $englishCategoryPageContents = CategoryPageContent::where('lang_code', 'en')->get();
            if($englishCategoryPageContents)
            {
                foreach ($englishCategoryPageContents as $content) {
                    $categoryContents = new CategoryPageContent;
                    $categoryContents->meta_key = $content->meta_key;
                    $categoryContents->meta_value = $content->meta_value;
                    $categoryContents->lang_code = $content->lang_code;  
                    $categoryContents->type = $content->type;  
                    $categoryContents->save();
                }
            }
            $categoryPageContents = CategoryPageContent::where('lang_code', $lang)->get();
        }
        return view('Admin.site-content.categories_page',compact('categoryPageContents'));
    }
    public function categoryPageContentUpdate(Request $request)
    {

        $this->uploadImagesCategoryPage($request, 'category_header_image');
        $this->uploadImagesCategoryPage($request, 'category_background_image');
        $textFields = [
            'heading',
            'description',
            'search_placeholder_text',
            'main_heading',
        ];

        foreach($textFields as $field){
            if($request->has($field)){
                $datas = $request->get($field);
                foreach($datas as $id=> $val){
                    $categoryContent = CategoryPageContent::find($id);
                    if($categoryContent)
                    {
                        $categoryContent->update([
                            'meta_value' => $val,
                        ]);
                    }
                }
              
            }
        }
        return redirect()->back()->with('success', 'Category content updated successfully.');
    }
    private function uploadImagesCategoryPage(Request $request, $imageField)
    {
        if ($request->hasFile($imageField)) {
            foreach ($request->file($imageField) as $id => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($imageField), $fileName);

                $homeContent = CategoryPageContent::find($id);
                if ($homeContent) {
                    $homeContent->update([
                        'meta_value' => $imageField . '/' . $fileName,
                    ]);
                }
            }
        }
    }

    public function topProductPageContent()
    {
        $lang = getCurrentLocale();
        if(session()->has('lang_code')){
            $lang = session()->get('lang_code');
        }
        $topProductContents = TopProductContent::where('lang_code',$lang)->get();
        $currentLanguage = SiteLanguages::where('handle', $lang)->first();
        if ($topProductContents->isEmpty()) {
            $englishTopProductContents= TopProductContent::where('lang_code', 'en')->get();
            if($englishTopProductContents)
            {
                foreach ($englishTopProductContents as $content) {
                    $topProductContents = new TopProductContent;
                    $topProductContents->meta_key = $content->meta_key;
                    $topProductContents->meta_value = $content->meta_value;
                    $topProductContents->lang_code = $currentLanguage->handle;  
                    $topProductContents->type = $content->type;  
                    $topProductContents->save();
                }
            }
            $topProductContents = TopProductContent::where('lang_code', $lang)->get();
        }

        return view('Admin.site-content.top_product_page',compact('topProductContents'));
    }
    public function topProductPageUpdate(Request $request)
    {
        $this->uploadImagesTopProductPage($request, 'top_pro_banner_image');
        $this->uploadImagesTopProductPage($request, 'top_pro_banner_bg_image');
        $this->uploadImagesTopProductPage($request, 'top_pro_facebook_icon');
        $this->uploadImagesTopProductPage($request, 'top_pro_pinterest_icon');
        $this->uploadImagesTopProductPage($request, 'top_pro_twitter_icon');
        $this->uploadImagesTopProductPage($request, 'top_pro_copylink_icon');
        $this->uploadImagesTopProductPage($request, 'top_pro_more_icon');
        $this->uploadImagesTopProductPage($request, 'top_pro_mail_image');
         $this->uploadImagesTopProductPage($request, 'top_pro_green_tick_img');
        $textFields = [
            'header_title',
            'header_sub_title',
            'header_bottom_text',
            'learn_more',
            'search_placeholder',
            'user_rating',
            'price',
            'price_option',
            'features',
            'show_more',
            'deployment',
            'company_size',
            'drop_down_text',
            'visit_website',
            'read_more',
            'key_features',
            'starting_price',
            'month',
            'compare_products',
            'rating',
            'footer_title',
            'footer_sub_title',
            'email_placeholder',
            'subscribe_lable',
            'you_agree',
            'terms_of_use',
            'privacy_policy',
            'and'
        ];
        foreach($textFields as $field){
            if($request->has($field)){
                $datas = $request->get($field);
                foreach($datas as $id=> $val){
                    $categoryContent = TopProductContent::find($id);
                    if($categoryContent)
                    {
                        $categoryContent->update([
                            'meta_value' => $val,
                        ]);
                    }
                }
              
            }
        }
        return redirect()->back()->with('success', 'Top Product content updated successfully.');
    }
    private function uploadImagesTopProductPage(Request $request, $imageField)
    {
        if ($request->hasFile($imageField)) {
            foreach ($request->file($imageField) as $id => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($imageField), $fileName);

                $homeContent = TopProductContent::find($id);
                if ($homeContent) {
                    $homeContent->update([
                        'meta_value' => $imageField . '/' . $fileName,
                    ]);
                }
            }
        }
    }
}
