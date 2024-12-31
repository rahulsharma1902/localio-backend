<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SiteLanguages;
use App\Models\TopProductContent;
use App\Models\Wishlist;
class ProductController extends Controller
{
    //
    public function productDetail(){
        return view('User.product.product_detail');
    }
    public function topRatedProduct()
    {
        $locale = getCurrentLocale();

        $productMaxPrice = Product::max('product_price');
        $siteLanguage = SiteLanguages::where('handle',$locale)->first();
        // $products = Product::with([
        //                         'translations' => function($query) use($siteLanguage) {
        //                             $query->where('language_id', $siteLanguage->id);
        //                         },
        //                         'keyFeatures.translations' => function($query) use ($siteLanguage) {
        //                             $query->where('language_id', $siteLanguage->id);
        //                         },
        //                         'categories.translations'=> function($query) use ($siteLanguage) {
        //                             $query->where('language_id', $siteLanguage->id);
        //                         },
        //                     ])
        //                     ->orderBy('product_price', 'desc')
        //                     ->paginate(2);
        $products = Product::with([
                            'translations' => function($query) use($siteLanguage) {
                                $query->where('language_id', $siteLanguage->id);
                            },
                            'keyFeatures.translations' => function($query) use ($siteLanguage) {
                                $query->where('language_id', $siteLanguage->id);
                            },
                            'categories.translations'=> function($query) use ($siteLanguage) {
                                $query->where('language_id', $siteLanguage->id);
                            },'reviews'
                        ])
                        ->orderBy('product_price', 'desc')
                        ->paginate(2);
        foreach ($products as $product) {
            $product->average_rating = $product->reviews->avg('rating') ?: 0;
            $product->reviews_count = $product->reviews->count();
        }

        $topProductContents = TopProductContent::where([['lang_code',$locale],['type','text']])->pluck('meta_value','meta_key');
        if($topProductContents->isEmpty())
        {
            $topProductContents = TopProductContent::where([['lang_code','en'],['type','text']])->pluck('meta_value','meta_key');

        }
        return view('User.product.top_rated_product',compact('products','topProductContents','productMaxPrice'));
    }
    public function productComparison()
    {
        return view('User.product.product_comparison');
    }

    public function fetchProduct(Request $request)
    {
        try {
        
            $locale = getCurrentLocale();
            $siteLanguage = SiteLanguages::where('handle', $locale)->first();
            $searchQuery = $request->searchQuery;
            $min = $request->min;
            $max = $request->max;
            $topProductContents = $this->getTopProductContents($locale);
            $files = $this->getFiles();

            $productPriceFilter = $this->getProductPriceFilter($min, $max, $siteLanguage);
            
            foreach ($productPriceFilter as $product) {
                $product->average_rating = $product->reviews->avg('rating') ?: 0;
                $product->reviews_count = $product->reviews->count();
            }


            $formattedProductRelations = $this->mapProductRelations($productPriceFilter);

            if ($searchQuery) {
                $searchResults = $this->getSearchResults($searchQuery, $siteLanguage);
            
                foreach ($searchResults as $product) {
                    $product->average_rating = $product->reviews->avg('rating') ?: 0;
                    $product->reviews_count = $product->reviews->count();
                }
  
                $formattedProductRelations = $this->mapProductRelations($searchResults);
                return response()->json([
                    'products' => $searchResults,
                    'topProductContents' => $topProductContents,
                    'files' => $files,
                    'formattedProductRelations' => $formattedProductRelations
                ]);
            }

            return response()->json([
                'products' => $productPriceFilter,
                'topProductContents' => $topProductContents,
                'files' => $files,
                'formattedProductRelations' => $formattedProductRelations
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getTopProductContents($locale)
    {
        $topProductContents = TopProductContent::where([['lang_code', $locale], ['type', 'text']])
            ->pluck('meta_value', 'meta_key');
        
        if ($topProductContents->isEmpty()) {
            $topProductContents = TopProductContent::where([['lang_code', 'en'], ['type', 'text']])
                ->pluck('meta_value', 'meta_key');
        }
        
        return $topProductContents;
    }

    private function getFiles()
    {
        return TopProductContent::where([['lang_code', 'en'], ['type', 'file']])
            ->pluck('meta_value', 'meta_key')
            ->mapWithKeys(function ($value, $key) {
                return [$key => asset($value)];
            });
    }

    private function getProductPriceFilter($min, $max, $siteLanguage)
    {
        if ($min || $max) {
            return Product::whereBetween('product_price', [$min, $max])
                ->with(['translations' => function ($query) use ($siteLanguage) {
                    $query->where('language_id', $siteLanguage->id);
                },'reviews'
                ])
                ->orderBy('product_price', 'desc')
                ->get();
        }
        return collect(); 
    }

    private function getSearchResults($searchQuery, $siteLanguage)
    {
        return Product::where('name', 'like', '%' . $searchQuery . '%')
            ->with([
                'translations' => function ($query) use ($siteLanguage, $searchQuery) {
                    $query->where('language_id', $siteLanguage->id)
                        ->where('name', 'like', '%' . $searchQuery . '%');
                },
                'keyFeatures.translations' => function ($query) use ($siteLanguage) {
                    $query->where('language_id', $siteLanguage->id);
                },'reviews'
            ])
            ->orderBy('name', 'desc')
            ->get();
    }

    private function mapProductRelations($products)
    {
        return $products->map(function ($productRelation) {
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
    }

    public function addToWishlist(Request $request)
    {
        $id = $request->id;
        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    
        $existingWishlist = Wishlist::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();
        if ($existingWishlist) {
            return response()->json(['info' => 'Product already in wishlist'], 200);
        }
        $wishlist = new Wishlist();
        $wishlist->user_id = $userId;
        $wishlist->product_id = $product->id;
        $wishlist->save();
    
        return response()->json(['success' => 'Wishlist added successfully'], 200);
    }
    

}