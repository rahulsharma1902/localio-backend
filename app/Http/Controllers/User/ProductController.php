<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SiteLanguages;
use App\Models\TopProductContent;
use App\Models\ProConsTranslation;
use App\Models\Keyfeature;
use App\Models\ProductFeature;
use App\Models\ProductFeatureTranslate;
use App\Models\ProCons;

use App\Models\Wishlist;

class ProductController extends Controller
{
    //
    public function productDetail()
    {
        $product = Product::find(1);
        if (!$product) {
            return redirect()->route('product')->with('error', 'Product not found!');
        }
        $pross_id = ProCons::where('product_id', 1)->where('type', 'pross')->value('id');
        $prss_data = ProConsTranslation::where('pro_cons_id', $pross_id)->pluck('name')->toArray();
        $cons_id = ProCons::where('product_id', 1)->where('type', 'cons')->value('id');
        $cons_data = ProConsTranslation::where('pro_cons_id', $cons_id)->pluck('name')->toArray();
        $fetured_id_typical_custmor = Keyfeature::where('product_id', 26)->where('type', 'typical_custmor')->pluck('feature_id');
        $typical_custmor = [];
        foreach ($fetured_id_typical_custmor as $value) {
            $featured_name_typical_custmor = ProductFeatureTranslate::where('product_feture_id', $value)->value('name');
            $typical_custmor[] = $featured_name_typical_custmor;
        }

        $fetured_id_platform_supported = Keyfeature::where('product_id', 26)->where('type', 'platform_supported')->pluck('feature_id');
        $platform_supported = [];
        foreach ($fetured_id_platform_supported as $value) {
            $featured_name_platform_supported = ProductFeatureTranslate::where('product_feture_id', $value)->value('name');
            $platform_supported[] = $featured_name_platform_supported;
        }

        $fetured_id_support_options = Keyfeature::where('product_id', 26)->where('type', 'support_options')->pluck('feature_id');
        $support_options = [];
        foreach ($fetured_id_support_options as $value) {
            $featured_name_support_options = ProductFeatureTranslate::where('product_feture_id', $value)->value('name');
            $support_options[] = $featured_name_support_options;
        }

        $fetured_id_tranning_options = Keyfeature::where('product_id', 26)->where('type', 'tranning_options')->pluck('feature_id');
        $tranning_options = [];
        foreach ($fetured_id_tranning_options as $value) {
            $featured_name_tranning_options = ProductFeatureTranslate::where('product_feture_id', $value)->value('name');
            $tranning_options[] = $featured_name_tranning_options;
        }

        $fetured_id_top_features = Keyfeature::where('product_id', 1)->where('type', 'top_features')->pluck('feature_id');
        $top_features = [];
        foreach ($fetured_id_top_features as $value) {
            $featured_name_top_features = ProductFeatureTranslate::where('product_feture_id', $value)->value('name');
            $top_features[] = $featured_name_top_features;
        }

        $featured_all_data = [
            'typically_custmor' => $typical_custmor,
            'platform_supported' => $platform_supported,
            'support_options' => $support_options,
            'tranning_options' => $tranning_options,
            'top_features' => $top_features
        ];

        // dd($featured_all_data['top_features']);

        return view('User.product.product_detail', compact('product', 'prss_data', 'cons_data', 'featured_all_data'));
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
