<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FeatureTransalte;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TopProductContent;
use App\Models\ProConsTranslation;
use App\Models\ProductFeature;
use App\Models\ProductFeatureTranslate;
use App\Models\ProCons;

use App\Models\Wishlist;

use function Laravel\Prompts\select;

class ProductController extends Controller
{
    //
    public function productDetail()
    {
        $product = Product::with(['product_features.featureTranslate' => function ($query) {
            $query->select('feature_id', 'name');
        }])->where('id', 8)->first(); 
        if (!$product) {
            return redirect()->route('product')->with('error', 'Product not found!');
        }
        $result = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'product_price' => $product->product_price,
            'product_icon' => $product->product_icon,
            'product_image' => $product->product_image,
            'product_link' => $product->product_link,
            'overview' => $product->overview,
            'product_features' => $product->product_features->map(function ($feature) {
                return [
                    'id' => $feature->id,
                    'feature_type' => $feature->feature_type,
                    'name' => $feature->featureTranslate->name,
                ];
            })->toArray(),
        ];
        // dd($result);
        $pross_id = ProCons::where('product_id', 1)->where('type', 'pross')->value('id');
        $prss_data = ProConsTranslation::where('pro_cons_id', $pross_id)->pluck('name')->toArray();
        $cons_id = ProCons::where('product_id', 1)->where('type', 'cons')->value('id');
        $cons_data = ProConsTranslation::where('pro_cons_id', $cons_id)->pluck('name')->toArray();
        return view('User.product.product_detail', compact('result', 'prss_data', 'cons_data'));
    }




    public function topRatedProduct()
    {
        $lang_id = getCurrentLanguageID();
        $productMaxPrice = Product::max('product_price');
        return view('User.product.top_rated_product', compact('products', 'topProductContents', 'productMaxPrice', 'files'));
    }
    public function productComparison()
    {
        return view('User.product.product_comparison');
    }

    public function fetchProduct(Request $request)
    {
        try {

            $locale = getCurrentLocale();
            $searchQuery = $request->searchQuery;
            $min = $request->min;
            $max = $request->max;
            $topProductContents = $this->getTopProductContents($locale);
            $files = $this->getFiles();

            // $productPriceFilter = $this->getProductPriceFilter($min, $max);

            // foreach ($productPriceFilter as $product) {
            //     $product->average_rating = $product->reviews->avg('rating') ?: 0;
            //     $product->reviews_count = $product->reviews->count();
            // }


            // $formattedProductRelations = $this->mapProductRelations($productPriceFilter);

            if ($searchQuery) {
                // $searchResults = $this->getSearchResults($searchQuery, $siteLanguage);

                // foreach ($searchResults as $product) {
                //     $product->average_rating = $product->reviews->avg('rating') ?: 0;
                //     $product->reviews_count = $product->reviews->count();
                // }

                // $formattedProductRelations = $this->mapProductRelations($searchResults);
                // return response()->json([
                //     'products' => $searchResults,
                //     'topProductContents' => $topProductContents,
                //     'files' => $files,
                //     'formattedProductRelations' => $formattedProductRelations
                // ]);
            }

            // return response()->json([
            //     'products' => $productPriceFilter,
            //     'topProductContents' => $topProductContents,
            //     'files' => $files,
            //     'formattedProductRelations' => $formattedProductRelations
            // ]);
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
        return TopProductContent::where([['lang_id', 1], ['type', 'file']])
            ->pluck('meta_value', 'meta_key')
            ->mapWithKeys(function ($value, $key) {
                return [$key => asset($value)];
            });
    }

    private function getProductPriceFilter($min, $max, $siteLanguage)
    {
        if ($min || $max) {
            return Product::whereBetween('product_price', [$min, $max])
                ->with([
                    'translations' => function ($query) use ($siteLanguage) {
                        $query->where('language_id', $siteLanguage->id);
                    },
                    'reviews'
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
                },
                'reviews'
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
