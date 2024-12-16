<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use App\Models\SiteLanguages;
use App\Models\HomeContentMedia;
class HomeContentController extends Controller
{
    //

    public function homeContent()
    {
        $langCode = getCurrentLocale(); 
        $homeContents = HomeContent::where('lang_code', $langCode)->get(); 
        if ($homeContents->isEmpty()) {
            $defaultContents = HomeContent::where('lang_code', 'en')->get(); 
            if (!$defaultContents->isEmpty()) {
                $siteLanguages = SiteLanguages::all(); 
                foreach ($siteLanguages as $language) {
                    $contentExists = HomeContent::where('lang_code', $language->handle)->exists(); // Check if content exists
                    if (!$contentExists) {
                        foreach ($defaultContents as $defaultContent) {
                            $newHomeContent = new HomeContent;
                            $newHomeContent->meta_key = $defaultContent->meta_key;
                            $newHomeContent->meta_value = $defaultContent->meta_value;
                            $newHomeContent->lang_code = $language->handle; 
                            $newHomeContent->save();
                        }
                    }
                }
                $homeContents = HomeContent::where('lang_code', $langCode)->get();
            }
        }

        return view('Admin.site-content.home_page', compact('homeContents'));
    }

    // public function homeContentUpdate(Request $request)
    // {

    //     if ($request->hasFile('logo_image')) {
    //         foreach ($request->file('logo_image') as $id => $file) {
    //             $fileName = time() . '_' . $file->getClientOriginalName();
    //             $filePath = $file->move(public_path('logo_image'), $fileName);
    //             $homeContent = HomeContent::find($id);
    //             if ($homeContent) {
    //                 $homeContent->update([
    //                     'meta_value' => 'logo_image/' . $fileName,
    //                 ]);
    //             }
    //         }
    //     }
    //     if ($request->hasFile('header_image')) {
    //         foreach ($request->file('header_image') as $id => $file) {
    //             $fileName = time() . '_' . $file->getClientOriginalName();
    //             $file->move(public_path('header_image'), $fileName);
    
    //             $homeContent = HomeContent::find($id);
    //             if ($homeContent) {
    //                 $homeContent->update([
    //                     'meta_value' => 'header_image/' . $fileName,
    //                 ]);
    //             }
    //         }
    //     }

    //     if ($request->brand_image) {
    //         foreach ($request->brand_image as $contentId => $files) {
    //             $content = HomeContent::find($contentId);
    //             if ($content && !empty($files)) {
    //                 $imageIds = [];
    //                 foreach ($files as $file) {
    //                     $fileName = time() . '_' . $file->getClientOriginalName();
    //                     $filePath = $file->move(public_path('brand_image'), $fileName);
    //                     $media = new HomeContentMedia;
    //                     $media->home_content_id = $content->id;
    //                     $media->file_path = 'brand_image/' . $fileName; 
    //                     $media->file_name = $fileName; 
    //                     $media->save();
    //                     $imageIds[] = $media->id;
    //                 }
    //                 $content->update([
    //                     'meta_value' => json_encode($imageIds),
    //                 ]);
    //             }
    //         }
    //     }

    //     foreach ($request->header_title as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }

    //     foreach ($request->header_description as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }

    //     foreach ($request->trusted_brand as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->popular_text as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->exlusive_deal as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->exlusive_lable as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->get_deal_lable as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->ai_search_title as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->ai_search_desc as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->top_product_text as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->all_product_lable as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->latest_review_text as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->write_review_lable as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->read_article_text as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->view_article_lable as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->find_tool_text as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }
    //     foreach ($request->get_button_lable as $id => $value) {
    //         $homeContent = HomeContent::find($id);
    //         if ($homeContent) {
    //             $homeContent->update(['meta_value' => $value]);
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Home content updated successfully.');
    // }


    public function homeContentUpdate(Request $request)
    {
        // Handle file uploads
        $this->uploadImages($request, 'logo_image');
        $this->uploadImages($request, 'header_image');
        $this->uploadImages($request, 'header_backgound_image');
        $this->uploadImages($request, 'ai_left_image');
        $this->uploadImages($request, 'ai_right_image');
        $this->uploadBrandImages($request);

        // Handle text updates
        $this->updateMetaValues($request, 'header_title');
        $this->updateMetaValues($request, 'header_description');
        $this->updateMetaValues($request, 'trusted_brand');
        $this->updateMetaValues($request, 'popular_text');
        $this->updateMetaValues($request, 'exlusive_deal');
        $this->updateMetaValues($request, 'exlusive_lable');
        $this->updateMetaValues($request, 'get_deal_lable');
        $this->updateMetaValues($request, 'ai_search_title');
        $this->updateMetaValues($request, 'ai_search_desc');
        $this->updateMetaValues($request, 'top_product_text');
        $this->updateMetaValues($request, 'all_product_lable');
        $this->updateMetaValues($request, 'latest_review_text');
        $this->updateMetaValues($request, 'write_review_lable');
        $this->updateMetaValues($request, 'read_article_text');
        $this->updateMetaValues($request, 'view_article_lable');
        $this->updateMetaValues($request, 'find_tool_text');
        $this->updateMetaValues($request, 'get_button_lable');
        $this->updateMetaValues($request, 'visit_wwebsite');
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
        if ($request->has($field)) {
            foreach ($request->$field as $id => $value) {
                $homeContent = HomeContent::find($id);
                if ($homeContent) {
                    $homeContent->update(['meta_value' => $value]);
                }
            }
        }
    }

}
