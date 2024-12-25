<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SiteLanguages;
use App\Models\TopProductContent;
class ProductController extends Controller
{
    //
    public function productDetail(){
        return view('User.product.product_detail');
    }
    public function topRatedProduct()
    {
        $locale = getCurrentLocale();
        $siteLanguage = SiteLanguages::where('handle',$locale)->first();
        $products = Product::with([
                                'translations' => function($query) use($siteLanguage) {
                                    $query->where('language_id', $siteLanguage->id);
                                },
                                'keyFeatures.translations' => function($query) use ($siteLanguage) {
                                    $query->where('language_id', $siteLanguage->id);
                                },
                                'categories.translations'=> function($query) use ($siteLanguage) {
                                    $query->where('language_id', $siteLanguage->id);
                                },
                            ])->paginate(2);

        $topProductContents = TopProductContent::where([['lang_code',$locale],['type','text']])->pluck('meta_value','meta_key');
        if($topProductContents->isEmpty())
        {
            $topProductContents = TopProductContent::where([['lang_code','en'],['type','text']])->pluck('meta_value','meta_key');

        }
        return view('User.product.top_rated_product',compact('products','topProductContents'));
    }
    public function productComparison()
    {
        return view('User.product.product_comparison');
    }
    public function fetchProduct(Request $request)
    {
   
        try {
            $locale = getCurrentLocale();
         
            $searchQuery = $request->input('searchQuery');
            $topProductContents = TopProductContent::where([['lang_code',$locale],['type','text']])->pluck('meta_value','meta_key');
            if($topProductContents->isEmpty())
            {
                $topProductContents = TopProductContent::where([['lang_code','en'],['type','text']])->pluck('meta_value','meta_key');
            }
            $files = TopProductContent::where([['lang_code', 'en'], ['type', 'file']])
                                        ->pluck('meta_value', 'meta_key')
                                        ->mapWithKeys(function ($value, $key) {
                                            return [$key => asset($value)];
                                        });
            $siteLanguage = SiteLanguages::where('handle',$locale)->first();
            
            $products = Product::where('name', 'like', '%' . $searchQuery . '%')
                                ->with(['translations' => function($query) use($siteLanguage, $searchQuery) {
                                    $query->where('language_id', $siteLanguage->id)
                                        ->where('name', 'like', '%' . $searchQuery . '%');
                                },'keyFeatures.translations' => function($query) use ($siteLanguage) {
                                    $query->where('language_id', $siteLanguage->id);
                                },
                                ])
                                ->get();

            $formattedProductRelations = $products->map(function ($productRelation) {

                $keyFeaturesForProduct = $productRelation->keyFeatures->map(function ($keyFeature) {
                    return [
                        'feature' => $keyFeature->translations->isNotEmpty()
                            ? $keyFeature->translations->first()->feature
                            : ($keyFeature->feature ?? 'No key feature'),
                    ];
                });
                return [
                    'product' => $productRelation, 
                    'keyFeatures' => $keyFeaturesForProduct
                ];
            });
  
        return response()->json(['products' => $products,'topProductContents'=>$topProductContents,'files'=>$files, 'formattedProductRelations' => $formattedProductRelations]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}