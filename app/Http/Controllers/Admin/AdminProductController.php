<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\ProCons;
use App\Models\ProConsTranslation;
use App\Models\ProductTranslation;
use App\Models\FeatureTransalte;
use App\Models\Feature;
use App\Models\{Filter, FilterOption};
use App\Models\Price;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\DB;
use App\Services\MediaService;
use App\Models\ProductFilterOption;

class AdminProductController extends Controller
{
    protected MediaService $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function products()
    {
        $lang_id = getCurrentLanguageID();
        $siteLanguage = Language::where('id', $lang_id)->first();
        $products = Product::with('categories')
            ->latest()
            ->get();
        return view('Admin.products.index', compact('products'));
    }

    // Add the new product from the admin panel
    public function productAdd()
    {
        $categories = Category::all();
        $price = Price::all();
        $product_feature = Feature::with([
            'feature_translation' => function ($query) {
                $query->select('feature_id', 'name');
            },
        ])
            ->select('id')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => optional($item->feature_translation)->name,
                ];
            })
            ->toArray();
        return view('Admin.products.add_product', compact('categories', 'product_feature', 'price'));
    }

    public function productAddProccess(Request $request)
    {
        //dd($request->all());
        // echo '<pre>';
        // print_r($request->all());
        // die();
        $language = Language::where('id', $request->lang_code)->first();

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'standard_price' => 'required|numeric|min:0',
            'pro_price' => 'required|numeric|min:0',
            'overview' => 'required|string',
            'product_category' => 'required',
            // 'product_price' => 'nullable',
            // 'prices' => 'required|array',
            // 'prices.*' => 'required|numeric|min:0',
            // 'tenures' => 'required|array',
            // 'tenures.*' => 'required|string',
            'product_icon' => 'required|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'required|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            'pros_data' => 'nullable|array',
            'conse_data' => 'nullable|array',
            'product_feature' => 'required|array',
            'status' => 'nullable|in:public,private',
        ]);


// echo '<pre>';
//             print_r($request->all());
//             die();
        if (!$language) {
            return redirect()
                ->back()
                ->with('error', 'Current language not found');
        }

        // $product = isset($request->id) ? Product::find($request->id) : new Product();
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        // $product->product_price = $request->product_price;
        $product->base_price = $request->base_price;
        $product->standard_price = $request->standard_price;
        $product->pro_price = $request->pro_price;
        $product->overview = $request->overview;
        $product->product_link = $request->product_link;
        $product->status = $request->status ?? 'public';

        if ($request->hasFile('product_icon')) {
            $media = $this->mediaService->uploadMedia($request->file('product_icon'), 'products/images');
            $product->product_icon = $media->id ?? null;
        }

        if ($request->hasFile('product_image')) {
            $media = $this->mediaService->uploadMedia($request->file('product_image'), 'products/images');
            $product->product_image = $media->id ?? null;
        }

        $product->save();



        foreach ($request->product_category as $value) {
            CategoryProduct::create([
                'category_id' => $value,
                'product_id' => $product->id,
            ]);
        }

        $pros = $request->input('pros', []);
        $cons = $request->input('cons', []);

        if (!empty($pros)) {
            foreach ($pros as $pro) {
                ProCons::create([
                    'name' => $pro['name'],
                    'description' => $pro['description'],
                    'type' => 'pross',
                    'product_id' => $product->id
                ]);
            }
        }

        if (!empty($cons)) {
            foreach ($cons as $con) {
                ProCons::create([
                    'name' => $con['name'],
                    'description' => $con['description'],
                    'type' => 'cons',
                    'product_id' => $product->id
                ]);
            }
        }


        // Save product features
        foreach ($request->product_feature as $id) {
            $type = Feature::where('id', $id)->value('type');
            ProductFeature::create([
                'product_id' => $product->id,
                'feature_id' => $id,
                'feature_type' => $type,
            ]);
        }

        // Save multiple product prices
        // Save multiple prices for the product
        if (isset($request->prices) && is_array($request->prices)) {
            foreach ($request->prices as $index => $price) {
                Price::create([
                    'product_id' => $product->id,
                    'price' => $price,
                    'tenure' => $request->tenures[$index] ?? null,
                ]);
            }
        }
        if ($request->has('selected_filters') && !empty($request->selected_filters)) {
            $selectedFilters = json_decode($request->selected_filters, true);

            // // **Debugging: Check if selected filters are being received**
            // dd($selectedFilters);

            if (json_last_error() !== JSON_ERROR_NONE) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid filter data. JSON decode failed.');
            }

            if (is_array($selectedFilters)) {
                foreach ($selectedFilters as $filter) {
                    ProductFilterOption::updateOrCreate([
                        'category_id' => $filter['category_id'],
                        'filter_id' => $filter['filter_id'],
                        'filter_option_id' => $filter['filter_option_id'],
                        'product_id' => $product->id,
                    ]);
                }
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid filter data. Please try again.');
            }
        }
        return redirect()
            ->route('products')
            ->with('success', 'Product added successfully');
    }
    public function fetchFilters(Request $request)
    {
        $categoryIds = $request->categories ?? []; // Ensure it's an array

        if (!is_array($categoryIds)) {
            return response()->json(['error' => 'Invalid categoryIds format'], 400);
        }
        $getCurrentSiteLanguage = getCurrentSiteLanguage();
        $filters = Filter::with([
            'options.translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
            'translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
            'category.translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
        ])
            ->whereIn('category_id', $categoryIds)
            ->get();
        // dd($filters->toArray());

        return response()->json($filters);
    }

    public function productEdit($id)
    {
        $proconseid = ProCons::where('product_id', $id)
            ->where('type', 'pross')
            ->value('id');
        $conseid = ProCons::where('product_id', $id)
            ->where('type', 'cons')
            ->value('id');

        $proconse_data = $proconseid
            ? ProConsTranslation::where('pro_cons_id', $proconseid)
                ->get()
                ->toArray()
            : [];
        $cronse_data = $conseid
            ? ProConsTranslation::where('pro_cons_id', $conseid)
                ->get()
                ->toArray()
            : [];

        $categories = Category::with('translations')->get();
        $getCurrentSiteLanguage = getCurrentSiteLanguage();
        $getCurrentSiteLanguageId = (int) $getCurrentSiteLanguage->id; // Ensure it's an integer

        $product = Product::with([
            'categories',
            'prons',
            'prons.translation'=> function ($query) use ($getCurrentSiteLanguageId) {
                $query->where('language_id', $getCurrentSiteLanguageId);
            },
            'cons',
            'cons.translation'=> function ($query) use ($getCurrentSiteLanguageId) {
                $query->where('language_id', $getCurrentSiteLanguageId);
            },
            'prices',
            'categories.translations',
            'translations' => function ($query) use ($getCurrentSiteLanguageId) {
                $query->where('language_id', $getCurrentSiteLanguageId);
            },
            'filters',

            ])->findOrFail($id);


        $languageId = getCurrentLanguageID();
        $language = Language::find($languageId);
            // echo '<pre>';
            // print_r($product->toArray());
            // die();
        // Get selected category IDs
        $selectedCategoryIds = $product->categories->pluck('id')->toArray();

        // Get selected filter option IDs
        $selectedFilterOptions = ProductFilterOption::where('product_id', $product->id)
        ->pluck('filter_option_id')
        ->toArray();

        // Fetch filters based on selected categories
        $filters = Filter::whereIn('category_id', $selectedCategoryIds)
        ->with('filterOptions')
        ->get();


        // $product = Product::with('categories.translations')->find($id);
        // $product = Product::with('prices')->find($id);

        $category_products = CategoryProduct::where('product_id', $id)
            ->pluck('category_id')
            ->toArray();

        $cat_arr = !empty($category_products)
            ? Category::whereIn('id', $category_products)
                ->get(['id', 'name'])
                ->toArray()
            : [];

        $features = FeatureTransalte::all();
        $feature_product1 = ProductFeature::where('product_id', $id)
            ->pluck('feature_id')
            ->toArray();
        $feature_arr = !empty($feature_product1)
            ? FeatureTransalte::whereIn('feature_id', $feature_product1)
                ->get(['id', 'name'])
                ->toArray()
            : [];
            $language_id = Language::where('lang_code', getCurrentLocale())->value('id');

    // Fetch product translation for the selected language
    $productTranslation = ProductTranslation::where('product_id', $id)
        ->where('language_id', $language_id)
        ->first();

    // Get the status from translation, fallback to default product status
    $status = $productTranslation ? $productTranslation->status : $product->status;
        // dd($feature_arr);

        return view('Admin.products.update_product', compact('product', 'categories', 'cat_arr', 'proconse_data', 'cronse_data', 'feature_arr', 'features', 'product', 'productTranslation','selectedCategoryIds', 'filters', 'selectedFilterOptions','status'));
    }
    public function productUpdateProccess(Request $request, Product $product)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die();
        $request->validate([
            'id' => 'required|exists:products,id',
            'lang_code' => 'required|exists:languages,id',
            'name' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'standard_price' => 'required|numeric|min:0',
            'pro_price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'overview' => 'required|string',
            'product_category' => 'required|array|min:1',
            'product_category.*' => 'exists:categories,id',
            // 'product_price' => 'nullable|numeric',
            // 'prices' => 'required|array',
            // 'prices.*' => 'required|numeric|min:0',
            // 'tenures' => 'required|array',
            // 'tenures.*' => 'required|string',
            'product_icon' => 'nullable|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'nullable|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            // 'pross_data' => 'nullable|array',
            // 'conse_data' => 'nullable|array',
            'filter_options' => 'nullable|array',
            'product_category' => 'required|array',
            'selected_filters' => 'nullable|string',
            'status' => 'nullable|in:public,private',


            'pros' => 'array',
            'pros.*.name' => 'required|string|max:255',
            'pros.*.description' => 'nullable|string',
            'cons' => 'array',
            'cons.*.name' => 'required|string|max:255',
            'cons.*.description' => 'nullable|string',

        ]);
        $languageRole = getYourLanguageRole();

        $language = Language::find($request->lang_code);

        if (!$language) {
            return redirect()
                ->back()
                ->with('error', 'Current language not found');
        }
        if($language->id === 1){
            $product = Product::find($request->id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->description = $request->description;
            $product->product_price = $request->product_price;
            $product->base_price = $request->base_price;
            $product->standard_price = $request->standard_price;
            $product->pro_price = $request->pro_price;
            $product->overview = $request->overview;
            $product->product_link = $request->product_link;

            if ($request->hasFile('product_icon')) {
                $media = $this->mediaService->uploadMedia($request->file('product_icon'), 'products/images');
                $product->product_icon = $media->id ?? null;
            }

            if ($request->hasFile('product_image')) {
                $media = $this->mediaService->uploadMedia($request->file('product_image'), 'products/images');
                $product->product_image = $media->id ?? null;
            }
            $product->product_link = $request->product_link;
            $product->update();

            /** pronc or conss code : */
            $removeproncondata = $request->input('removeproncondata', []);
            if (!empty($removeproncondata)) {
                ProCons::whereIn('id', $removeproncondata)->delete();
                ProConsTranslation::whereIn('pro_cons_id', $removeproncondata)->delete();
            }

            $pros = $request->input('pros', []);
            $cons = $request->input('cons', []);
            if (!empty($pros)) {
                foreach ($pros as $pro) {
                    ProCons::updateOrCreate(
                        ['id' => $pro['id'] ?? null],
                        [
                            'name' => $pro['name'],
                            'description' => $pro['description'],
                            'type' => 'pross',
                            'product_id' => $request->id
                        ]
                    );
                }
            }

            if (!empty($cons)) {
                foreach ($cons as $con) {
                    ProCons::updateOrCreate(
                        ['id' => $con['id'] ?? null],
                        [
                            'name' => $con['name'],
                            'description' => $con['description'],
                            'type' => 'cons',
                            'product_id' => $request->id
                        ]
                    );
                }
            }

            /** add category to category product table : */
            CategoryProduct::where('product_id', $product->id)->delete();
            foreach ($request->product_category as $value) {
                CategoryProduct::updateOrCreate([
                    'category_id' => $value,
                    'product_id' => $product->id,
                ]);
            }

            /** filter option data  */
            ProductFeature::where('product_id', $request->id)->delete();

            $feature_ids = FeatureTransalte::whereIn('id', is_array($request->product_feature) ? $request->product_feature : [])
            ->pluck('feature_id')
            ->toArray();


            $data = [];
            foreach ($feature_ids as $feature_id) {
                $feature_type = Feature::where('id', $feature_id)->value('type');
                $data[] = [
                    'product_id' => $request->id,
                    'feature_id' => $feature_id,
                    'feature_type' => $feature_type,
                ];
            }

            // $existingPrices = Price::where('product_id', $product->id)
            //     ->get()
            //     ->keyBy('id');

            // foreach ($request->prices as $index => $price) {
            //     $tenure = $request->tenures[$index] ?? null;
            //     $priceId = $request->price_ids[$index] ?? null; // Retrieve price ID from form input

            //     if ($tenure && $priceId) {
            //         if (isset($existingPrices[$priceId])) {
            //             // Update existing price (Keeping same ID)
            //             $existingPrices[$priceId]->update([
            //                 'price' => $price,
            //                 'tenure' => $tenure,
            //             ]);
            //         }
            //     } else {
            //         // Insert new price if no existing ID is provided
            //         Price::create([
            //             'product_id' => $product->id,
            //             'price' => $price,
            //             'tenure' => $tenure,
            //         ]);
            //     }
            // }

            if ($request->has('selected_filters') && !empty($request->selected_filters)) {
                $selectedFilters = json_decode($request->selected_filters, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    return redirect()
                        ->back()
                        ->with('error', 'Invalid filter data. JSON decode failed.');
                }

                if (is_array($selectedFilters)) {
                    // **Fetch existing filters for this product**
                    $existingFilters = ProductFilterOption::where('product_id', $product->id)->get();

                    // **Create an array of currently selected filter option IDs**
                    $selectedFilterOptionIds = collect($selectedFilters)
                        ->pluck('filter_option_id')
                        ->toArray();

                    // **Delete filters that are no longer selected**
                    ProductFilterOption::where('product_id', $product->id)
                        ->whereNotIn('filter_option_id', $selectedFilterOptionIds)
                        ->delete();

                    // **Loop through selected filters and update or create**
                    foreach ($selectedFilters as $filter) {
                        ProductFilterOption::updateOrCreate([
                            'product_id' => $product->id,
                            'category_id' => $filter['category_id'],
                            'filter_id' => $filter['filter_id'],
                            'filter_option_id' => $filter['filter_option_id'], // Add this to make each filter unique
                        ]);
                    }
                } else {
                    return redirect()
                        ->back()
                        ->with('error', 'Invalid filter data. Please try again.');
                }
            }

            if (!empty($data)) {
                ProductFeature::insert($data);
            } else {
                return redirect()
                    ->route('products')
                    ->with('error', 'No valid features to insert.');
            }
            return redirect()->back()->with('success', 'Product updated successfully');


        }else{
            /** here is code for languagae data update : */
            // echo '<pre>';
            // print_r($request->all());
            // die();
            $product = Product::find($request->id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
            $translationProduct = ProductTranslation::firstOrNew([
                'product_id' => $product->id,
                'language_id' => $request->lang_code
            ]);
            $translationProduct->product_id = $product->id;
            $translationProduct->language_id = $request->lang_code;
            $translationProduct->name = $request->name;
            $translationProduct->slug = Str::slug($request->name);
            $translationProduct->description = $request->description;
            $translationProduct->overview = $request->overview;
            $translationProduct->status = $request->status ?? 'public';
            $translationProduct->product_link = $request->product_link;
            $translationProduct->save();

            /** translate pron cons */


            $prosTranslation = $request->input('pros', []);
            $consTranslation = $request->input('cons', []);

            if (!empty($prosTranslation)) {
                foreach ($prosTranslation as $pro) {
                    $prosTranslation = ProConsTranslation::where('pro_cons_id', $pro['id'])
                                        ->where('language_id', $request->lang_code)
                                        ->first() ?? new ProConsTranslation;

                    $prosTranslation->pro_cons_id = $pro['id'];
                    $prosTranslation->language_id = $request->lang_code;
                    $prosTranslation->name = $pro['name'];
                    $prosTranslation->description = $pro['description'];
                    $prosTranslation->type = 'pross';
                    $prosTranslation->save();


                }
            }

            if (!empty($consTranslation)) {
                foreach ($consTranslation as $con) {
                    $consTranslation = ProConsTranslation::where('pro_cons_id', $con['id'])
                                        ->where('language_id', $request->lang_code)
                                        ->first() ?? new ProConsTranslation;

                    $consTranslation->pro_cons_id = $con['id'];
                    $consTranslation->language_id = $request->lang_code;
                    $consTranslation->name = $con['name'];
                    $consTranslation->description = $con['description'];
                    $consTranslation->type = 'cons';
                    $consTranslation->save();

                }
            }


            return redirect()->back()->with('success', 'Product updated successfully');


        }

    }





    public function removeProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()
                ->back()
                ->with('error', 'product not found');
        }
        $product->delete();
        CategoryProduct::where('product_id', $id)->delete();
        return redirect()
            ->back()
            ->with('success', 'product remove successfully');
    }
    public function deletePrice($id)
    {
        $price = Price::find($id);
        if ($price) {
            $price->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}

// main branch code
