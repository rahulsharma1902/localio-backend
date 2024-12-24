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
            $products = Product::where('name', 'like', '%' . $searchQuery . '%')->get();
            $topProductContents = TopProductContent::where([['lang_code',$locale],['type','text']])->pluck('meta_value','meta_key');
            if($topProductContents->isEmpty())
            {
                $topProductContents = TopProductContent::where([['lang_code','en'],['type','text']])->pluck('meta_value','meta_key');
            }
            $files = TopProductContent::where([['lang_code','en'],['type','file']])->pluck('meta_value','meta_key');

            $siteLanguage = SiteLanguages::where('handle',$locale)->first();
            $productRelations = Product::with([
                                'translations' => function($query) use($siteLanguage) {
                                    $query->where('language_id', $siteLanguage->id);
                                },
                                'keyFeatures.translations' => function($query) use ($siteLanguage) {
                                    $query->where('language_id', $siteLanguage->id);
                                },
                                ])->get();

            return response()->json(['products' => $products,'topProductContents'=>$topProductContents,'productRelations'=>$productRelations,'files'=>$files]);
        } catch (\Exception $e) {

            \Log::error("Error fetching products: " . $e->getMessage());

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}