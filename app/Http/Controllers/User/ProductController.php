<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\CategoryTranslation;
use App\Models\FeatureTransalte;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TopProductContent;
use App\Models\ProConsTranslation;
use App\Models\ProductFeature;
use App\Models\ProductFeatureTranslate;
use App\Models\ProCons;
use App\Models\ProductTranslation;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function productDetail($locale, $id)
    {
        $product = Product::with(['product_features.featureTranslate' => function ($query) {
            $query->select('feature_id', 'name');
        }])->where('id', $id)->first();
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
            'product_features' => $product->product_features->toArray(),
        ];


        $pross_id = ProCons::where('product_id', 1)->where('type', 'pross')->value('id');
        $prss_data = ProConsTranslation::where('pro_cons_id', $pross_id)->pluck('name')->toArray();
        $cons_id = ProCons::where('product_id', 1)->where('type', 'cons')->value('id');
        $cons_data = ProConsTranslation::where('pro_cons_id', $cons_id)->pluck('name')->toArray();

        return view('User.product.product_detail', compact('result', 'prss_data', 'cons_data'));
    }

    public function topRatedProduct($lang, $category_slug = null)
    {
        $lang_id = getCurrentLanguageID();
        if ($category_slug != '') {
            $category_id  = CategoryTranslation::where('slug', $category_slug)->value('category_id');
            $category_product_ids = CategoryProduct::where('category_id', $category_id)->pluck('product_id');
            $products = Product::with(['product_features' => function ($query) {
                $query->with('feature_translation')->where('feature_type', 'top_features');
            }])
                ->whereIn('id', $category_product_ids)
                ->get();

        } else {
            $products = Product::with(['product_features' => function ($query) {
                $query->with('feature_translation')->where('feature_type', 'top_features');
            }])
                ->get();
        }
        $productMaxPrice = Product::max('product_price');
        return view('User.product.top_rated_product', compact('productMaxPrice', 'products'));
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
        $userId = Auth::id(); // Get the authenticated user ID

        // Check if user is authenticated
        if (!$userId) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Check if product exists
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Check if product is already in wishlist
        $existingWishlist = Wishlist::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($existingWishlist) {
            return response()->json(['info' => 'Product already in wishlist'], 200);
        }

        // Add to wishlist
        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'status' => 1 // Adding status field

        ]);

        return response()->json(['success' => 'Product added to wishlist'], 200);
    }

    public function destroyWishlist($locale,$id)
    {
    //   return response()->json(['id' => $id]);

        if (!Auth::check()) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $userId =  Auth::user()->id;
 // return response()->json(['userId' => $userId]);
        $wishlistItem = Wishlist::where('id', $id)->where('user_id', $userId)->first();

        if (!$wishlistItem) {
            return response()->json(['error' => 'Wishlist item not found'], 404);
        }

        // Delete wishlist item
        $wishlistItem->delete();
        return response()->json(['success' => 'Item removed'], 200);
    }





}
