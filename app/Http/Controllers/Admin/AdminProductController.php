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
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function products()
    {
        $lang_id = getCurrentLanguageID();
        $siteLanguage = Language::where('id', $lang_id)->first();
        $products = Product::with('categories')->latest()->get();
        // dd($products);
        return view('Admin.products.index', compact('products'));
    }
    public function productAdd()
    {
        $categories = Category::all();
        return view('Admin.products.add_product', compact('categories'));
    }
    public function productAddProccess(Request $request)
    {
        $language = Language::where('id', $request->lang_code)->first();
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'product_category' => 'required',  // Ensures category is selected and exists in categories table
            'product_price' => 'required|numeric',
            'product_icon' => 'required|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'required|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            'pros_data' => 'array',
            'conse_data' =>  'array',
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
            $productTranslation->language_id  = $language_id;
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

        $product = Product::with('keyFeatures', 'categories.translations')->find($id);

        $category_products = CategoryProduct::where('product_id', $id)->pluck('category_id')->toArray();

        $cat_arr = !empty($category_products)
            ? Category::whereIn('id', $category_products)->get(['id', 'name'])->toArray()
            : [];

        return view('Admin.products.update_product', compact('product', 'categories', 'cat_arr', 'proconse_data', 'cronse_data'));
    }
    public function productUpdateProccess(Request $request)
    {

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


        $matched = [];
        $notmatched = [];
        $pross_id = ProCons::where('product_id', $product->id)->where('type', 'pross')->value('id');
        if ($pross_id) {
            $existingTranslations = ProConsTranslation::where('pro_cons_id', $pross_id)->pluck('name')->toArray();
            $incomingFeatures = $request->pross_data;
            if (is_array($request->pross_data)) {
                $toDelete = array_diff($existingTranslations, $request->pross_data);
                $toInsert = array_diff($request->pross_data, $existingTranslations);
                DB::table('pro_cons_translations')
                    ->where('pro_cons_id', $pross_id)
                    ->whereIn('name', $toDelete)
                    ->delete();
                foreach ($toInsert as $feature) {
                    DB::table('pro_cons_translations')->insert([
                        'pro_cons_id' => $pross_id,
                        'name' => $feature ?? '',
                        'description' => 'null',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
                $matched = array_intersect($existingTranslations, $request->pross_data);
                $notmatched = $toInsert;
            } else {
                DB::table('pro_cons_translations')
                    ->where('pro_cons_id', $pross_id)
                    ->delete();
            }
        }


        $matched1 = [];
        $notmatched2 = [];
        $cross_id = ProCons::where('product_id', $product->id)->where('type', 'cons')->value('id');

        if ($cross_id) {
            $existingTranslations = ProConsTranslation::where('pro_cons_id', $cross_id)->pluck('name')->toArray();
            $incomingFeatures = $request->conse_data;
            if (is_array($request->conse_data)) {
                $toDelete = array_diff($existingTranslations, $request->conse_data);
                $toInsert = array_diff($request->conse_data, $existingTranslations);
                ProConsTranslation::where('pro_cons_id', $cross_id)->whereIn('name', $toDelete)->delete();
                foreach ($toInsert as $feature) {
                    ProConsTranslation::create([
                        'pro_cons_id' => $cross_id,
                        'name' => $feature ?? '',
                        'description' => 'null',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
                $matched1 = array_intersect($existingTranslations, $request->conse_data);
                $notmatched2 = $toInsert;
            } else {
                DB::table('pro_cons_translations')
                    ->where('pro_cons_id', $cross_id)
                    ->delete();
            }
        }

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }
    public function removeProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'product not found');
        }
        $product->delete();
        return redirect()->back()->with('success', 'product remove successfully');
    }
}
// main branch code 