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
use App\Models\ProductFeature;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function products()
    {
        $lang_id = getCurrentLanguageID();
        $siteLanguage = Language::where('id', $lang_id)->first();
        $products = Product::with('categories')->latest()->get();
        return view('Admin.products.index', compact('products'));
    }
    public function productAdd()
    {
        $categories = Category::all();
        $product_feature = Feature::with(['feature_translation' => function ($query) {
            $query->select('feature_id', 'name');
        }])
            ->select('id')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => optional($item->feature_translation)->name,
                ];
            })
            ->toArray();
        // i send the name and id of product fature and name send on the table product feature translate table  and id send on the product fateure table 
        return view('Admin.products.add_product', compact('categories', 'product_feature'));
    }


    public function productAddProccess(Request $request)
    {
        // dd($request->all());
        $language = Language::where('id', $request->lang_code)->first();
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'product_category' => 'required',
            'product_price' => 'required|numeric',
            'product_icon' => 'required|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'required|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            'pros_data' => 'array',
            'conse_data' =>  'array',
            'product_feature' => 'required|array'
        ]);

        if (!$language) {
            return redirect()->back()->with('error', 'current langauge not found');
        }

        if ($language) {
            $product = isset($request->id) ?  product::find($request->id) : new Product;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->description = $request->description;
            $product->product_price = $request->product_price;
            $product->overview = $request->overview;
            if ($request->hasFile('product_icon')) {
                $productIcon = $request->file('product_icon');
                $iconName = $product->slug . '-' . rand(0, 1000) . time() . '.' . $productIcon->getClientOriginalExtension();
                $productIcon->move(public_path() . '/ProductIcon/', $iconName);
                $product->product_icon = $iconName;
            }
            if ($request->hasFile('product_image')) {
                $productImage = $request->file('product_image');
                $imageName = $product->slug . '-' . rand(0, 999) . time() . '.' . $productImage->getClientOriginalExtension();
                $productImage->move(public_path() . '/ProductImage/', $imageName);
                $product->product_image = $imageName;
            }
            $product->product_link = $request->product_link;
            $product->save();
            $language_id = Language::where('lang_code', 'en-us')->value('id');
            $productTranslation =  new ProductTranslation();
            $productTranslation->name = $request->name;
            $productTranslation->slug = Str::slug($request->name);
            $productTranslation->description = $request->description;
            $productTranslation->product_id  = $product->id;
            $productTranslation->language_id  = 1;
            $productTranslation->save();
            foreach ($request->product_category as $value) {
                CategoryProduct::create([
                    'category_id' => $value,
                    'product_id' => $product->id
                ]);
            }

            if (is_array($request->pros_data)) {
                $procons_id = ProCons::create([
                    'product_id' => $product->id,
                    'lang_id' => $language_id,
                    'type' => 'pross',
                    'created_at' => now(),
                    'updated_at' => now(),
                ])->id;


                foreach ($request->pros_data as $value) {
                    ProConsTranslation::create([
                        'pro_cons_id' => $procons_id,
                        'name' => $value,
                        'description' => 'null',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            if (is_array($request->conse_data)) {
                $conse_id = ProCons::create([
                    'product_id' => $product->id,
                    'lang_id' => $language_id,
                    'type' => 'cons',
                    'created_at' => now(),
                    'updated_at' => now(),
                ])->id;

                foreach ($request->conse_data as $value) {
                    ProConsTranslation::create([
                        'pro_cons_id' => $conse_id,
                        'name' => $value,
                        'description' => 'null',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach ($request->product_feature as $key => $id) {
                $type = Feature::where('id', $id)->value('type');
                ProductFeature::create([
                    'product_id' => $product->id,
                    'feature_id' => $id,
                    'feature_type' => $type
                ]);
            }

            return redirect()->route('products')->with('success', 'Product  added successfully');
        } else {
            return redirect()->route('products')->with('error', 'something went wrong !');
        }
    }
    public function productEdit($id)
    {
        $proconseid = ProCons::where('product_id', $id)->where('type', 'pross')->value('id');
        $conseid = ProCons::where('product_id', $id)->where('type', 'cons')->value('id');

        $proconse_data = $proconseid
            ? ProConsTranslation::where('pro_cons_id', $proconseid)->get()->toArray()
            : [];
        $cronse_data = $conseid
            ? ProConsTranslation::where('pro_cons_id', $conseid)->get()->toArray()
            : [];

        $categories = Category::all();

        $product = Product::with('categories.translations')->find($id);
        $category_products = CategoryProduct::where('product_id', $id)->pluck('category_id')->toArray();

        $cat_arr = !empty($category_products)
            ? Category::whereIn('id', $category_products)->get(['id', 'name'])->toArray()
            : [];

        $features = FeatureTransalte::all();
        $feature_product1 = ProductFeature::where('product_id', $id)->pluck('feature_id')->toArray();
        $feature_arr = !empty($feature_product1)
            ? FeatureTransalte::whereIn('feature_id', $feature_product1)->get(['id', 'name'])->toArray()
            : [];
        // dd($feature_arr);
        return view('Admin.products.update_product', compact('product', 'categories', 'cat_arr', 'proconse_data', 'cronse_data', 'feature_arr', 'features'));
    }
    public function productUpdateProccess(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required|exists:products,id',
            'lang_code' => 'required|exists:languages,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'product_category' => 'required|array|min:1',
            'product_category.*' => 'exists:categories,id',
            'product_price' => 'required|numeric',
            'product_icon' => 'nullable|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'nullable|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            'pross_data' => 'array',
            'conse_data' =>  'array',
        ]);

        $language = Language::find($request->lang_code);
        if (!$language) {
            return redirect()->back()->with('error', 'Current language not found');
        }

        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->product_price = $request->product_price;
        $product->overview = $request->overview;

        if ($request->hasFile('product_icon')) {
            $iconName = $product->slug . '-' . uniqid() . '.' . $request->file('product_icon')->getClientOriginalExtension();
            $request->file('product_icon')->move(public_path('/ProductIcon/'), $iconName);
            $product->product_icon = $iconName;
        }

        if ($request->hasFile('product_image')) {
            $imageName = $product->slug . '-' . uniqid() . '.' . $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->move(public_path('/ProductImage/'), $imageName);
            $product->product_image = $imageName;
        }

        $product->product_link = $request->product_link;
        $product->update();

        $language_id = Language::where('lang_code', 'en-us')->value('id');
        ProductTranslation::updateOrCreate(
            ['product_id' => $product->id, 'language_id' => $language_id],
            [
                'name' => $request->name,
                'slug' => $product->slug,
                'description' => $request->description,
            ]
        );
        CategoryProduct::where('product_id', $product->id)->delete();
        foreach ($request->product_category as $value) {
            CategoryProduct::updateOrCreate(
                [
                    'category_id' => $value,
                    'product_id' => $product->id,
                ]
            );
        }

        // Prose  data manage
        $matched = [];
        $notmatched = [];
        $pross_id = ProCons::where('product_id', $product->id)->where('type', 'pross')->value('id');

        if ($pross_id) {
            $existingTranslations = ProConsTranslation::where('pro_cons_id', $pross_id)->pluck('name')->toArray();
            $incomingFeatures = $request->pross_data;

            if (is_array($incomingFeatures)) {
                $toDelete = array_diff($existingTranslations, $incomingFeatures);
                $toInsert = array_diff($incomingFeatures, $existingTranslations);
                if (!empty($toDelete)) {
                    ProConsTranslation::where('pro_cons_id', $pross_id)
                        ->whereIn('name', $toDelete)
                        ->delete();
                }

                foreach ($toInsert as $feature) {
                    ProConsTranslation::create([
                        'pro_cons_id' => $pross_id,
                        'name' => $feature ?? '',
                        'description' => 'null',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $matched = array_intersect($existingTranslations, $incomingFeatures);
                $notmatched = $toInsert;
            } else {
                ProConsTranslation::where('pro_cons_id', $pross_id)->delete();
            }
        }


        // conse data manage
        $matched1 = [];
        $notmatched2 = [];
        $cross_id = ProCons::where('product_id', $product->id)->where('type', 'cons')->value('id');

        if ($cross_id) {
            $existingTranslations = ProConsTranslation::where('pro_cons_id', $cross_id)->pluck('name')->toArray();

            $incomingFeatures = $request->conse_data;
            if (is_array($request->conse_data)) {
                $toDelete = array_diff($existingTranslations, $request->conse_data);
                $toInsert = array_diff($request->conse_data, $existingTranslations);
                if (!empty($toDelete)) {
                    ProConsTranslation::where('pro_cons_id', $cross_id)
                        ->whereIn('name', $toDelete)
                        ->delete();
                }
                foreach ($toInsert as $feature) {
                    ProConsTranslation::create([
                        'pro_cons_id' => $cross_id,
                        'name' => $feature ?? '',
                        'description' => 'null',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
                $matched1 = array_intersect($existingTranslations, $incomingFeatures);
                $notmatched2 = $toInsert;
            } else {
                ProConsTranslation::where('pro_cons_id', $cross_id)->delete();
            }
        }
        //     ProductFeature::where('product_id', $request->id)
        //     ->whereNotIn('feature_id', $request->product_feature)
        //     ->delete();

        // foreach ($request->product_feature as $feature_id) {
        //     // Check if the feature_id exists in the features table
        //     $feature = Feature::find($feature_id);

        //     // If feature exists, insert or update the product features
        //     if ($feature) {
        //         $feature_type = $feature->type; // Assuming the 'type' column is available
        //         ProductFeature::updateOrCreate(
        //             ['product_id' => $request->id, 'feature_id' => $feature_id],
        //             ['feature_type' => $feature_type]
        //         );
        //     } else {
        //         // Optionally handle cases where feature_id does not exist in the 'features' table
        //         return redirect()->route('products')->with('error', 'Feature ID does not exist.');
        // }
        // }
        // Get the valid feature IDs
        ProductFeature::where('product_id', $request->id)->delete();

        // Filter out the invalid feature IDs from the request
        $feature_ids = FeatureTransalte::whereIn('id', $request->product_feature)->pluck('feature_id')->toArray();

        // Prepare data for insertion
        $data = [];
        foreach ($feature_ids as $feature_id) {
            $feature_type = Feature::where('id', $feature_id)->value('type');
            $data[] = [
                'product_id' => $request->id,
                'feature_id' => $feature_id,
                'feature_type' => $feature_type
            ];
        }
        // dd($data);

        // Insert the records into the product_features table
        if (!empty($data)) {
            ProductFeature::insert($data);
        } else {
            return redirect()->route('products')->with('error', 'No valid features to insert.');
        }

        return redirect()->route('products')->with('success', 'Product features updated successfully.');

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }
    public function removeProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'product not found');
        }
        $product->delete();
        CategoryProduct::where('product_id',$id)->delete();
        return redirect()->back()->with('success', 'product remove successfully');
    }
}
// main branch code
