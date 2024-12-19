<?php

namespace App\Http\Controllers\Admin\SiteContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderContent;
use File;
use App\Models\FooterContent;
use App\Models\HomeContent;
use App\Models\HomeContentMedia;
use App\Models\CategoryPageContent;
use App\Models\TopProductContent;
class SiteContentController extends Controller
{
    //

    public function homeContent()
    {
        return view('Admin.site-content.home_page');
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
        // Handle file uploads
        $this->uploadImages($request, 'logo_image');
        $this->uploadImages($request, 'header_image');
        $this->uploadImages($request, 'header_backgound_image');
        $this->uploadImages($request, 'ai_left_image');
        $this->uploadImages($request, 'ai_right_image');
        $this->uploadImages($request, 'find_tool_left_image');
        $this->uploadImages($request, 'find_tool_right_image');
        $this->uploadImages($request, 'verified_reviews_image');
        $this->uploadImages($request, 'feature_price_image');
        $this->uploadImages($request, 'independ_image');
        $this->uploadBrandImages($request);

        return redirect()->back()->with('success', 'Home content updated successfully.');
    }

    private function uploadImages(Request $request, $imageField)
    {
        if ($request->hasFile($imageField)) {
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

    private function updateMetaValues(Request $request, $field)
    {
        if ($request->has($field) && is_array($request->$field)) {
            foreach ($request->$field as $id => $value) {
                $homeContent = HomeContent::find($id);

                if ($homeContent) {

                    if (!empty($value)) {
                        $homeContent->update(['meta_value' => $value]);
                    }
                } 
            }
        }
    }

    public function headerPage()
    {
        $headerContents = HeaderContent::all();
        return view('Admin.site-content.header_page',compact('headerContents'));
    }
    public function headerContentUpdate(Request $request)
    {
        $this->updateHeaderMetaValues($request, 'header_logo');
        return redirect()->back()->with('success', 'Header content updated successfully.');
    }
    private function updateHeaderMetaValues(Request $request, $imageField)
    {
        if ($request->hasFile($imageField)) {
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
        $footerContents = FooterContent::all();

        return view('Admin.site-content.footer_page',compact('footerContents'));
    }
    public function footerPageUpdate(Request $request)
    {
            $this->uploadImagesFooter($request, 'footer_logo');
            $this->uploadImagesFooter($request, 'facebook_icon');
            $this->uploadImagesFooter($request, 'instagram_icon');
            $this->uploadImagesFooter($request, 'twitter_icon');
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
        $categoryPageContents = CategoryPageContent::where('lang_code','en')->get();

        return view('Admin.site-content.categories_page',compact('categoryPageContents'));
    }
    public function categoryPageContentUpdate(Request $request)
    {
        $this->uploadImagesCategoryPage($request, 'category_header_image');
        $this->uploadImagesCategoryPage($request, 'category_background_image');
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
        $topProductContents = TopProductContent::where('lang_code','en')->get();

        return view('Admin.site-content.top_product_page',compact('topProductContents'));
    }
}
