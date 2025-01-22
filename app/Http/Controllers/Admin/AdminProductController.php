<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductKeyFeature;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\ProductTranslation;
use App\Models\ProductKeyFeatureTranslation;
class AdminProductController extends Controller
{
    
    public function products()
    {
        // $products = Product::with(['translations', 'keyFeatures.translations', 'categories'])->get();
        $locale = getCurrentLocale();
        $siteLanguage = Language::where('lang_code',$locale)->first();
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
                            ])->get();

       return view('Admin.products.index',compact('products'));
    }
    public function productAdd()
    {
        $categories = Category::all();
        return view('Admin.products.add_product',compact('categories'));
    }
    public function productAddProccess(Request $request)
    {   
        $keyFeatures = array_filter($request->input('key_features'), function ($value) {
            return !empty($value);
        });
        // Validate the filtered key_features array
        $request->merge(['key_features' => $keyFeatures]);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'product_category' => 'required',  // Ensures category is selected and exists in categories table
            'product_price' => 'required|numeric',
            'product_icon' => 'nullable|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'nullable|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            'key_features' => 'required|array|min:1',
        ]);
        $lang_code = Language::where('lang_code',$request->lang_code)->first();
        if(!$lang_code)
        {
            return redirect()->back()->with('error','current langauge not found');
        }

        if($lang_code)
        {
            $productTranslation = isset($request->product_tr_id) ? ProductTranslation::find($request->product_tr_id) : new ProductTranslation();
            $productTranslation->name = $request->name;
            $productTranslation->slug = Str::slug($request->name);
            $productTranslation->description = $request->description;
            $productTranslation->product_id  = $request->id;
            $productTranslation->language_id  = $lang_code->id;
            $productTranslation->save();
            $keyFeatures = $request->key_features; 
            foreach ($keyFeatures as $keyFeatureId => $translatedFeature) {
                $feature = ProductKeyFeature::find($keyFeatureId);
                if ($feature) {
                    $keyFeatureTranslation = ProductKeyFeatureTranslation::updateOrCreate(
                        [
                            'product_key_id' => $keyFeatureId,
                            'language_id' => $lang_code->id,
                        ],
                        [
                            'feature' => $translatedFeature,
                        ]
                    );
                }
            }
            return redirect()->route('products')->with('success', 'Product translation added successfully');

        }else{
            $product = isset($request->id) ?  product::find($request->id) : new Product;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->description = $request->description;
            $product->product_price = $request->product_price;
            if($request->hasFile('product_icon'))
            {   
                $productIcon = $request->file('product_icon');
                $iconName = $product->slug . '-' . rand(0, 1000) . time() . '.' . $productIcon->getClientOriginalExtension();
                $productIcon->move(public_path().'/ProductIcon/',$iconName);
                $product->product_icon = $iconName;
            }
            if($request->hasFile('product_image'))
            {
                $productImage = $request->file('product_image');
                $imageName = $product->slug.'-'.rand(0,999).time().'.'.$productImage->getClientOriginalExtension();
                $productImage->move(public_path().'/ProductImage/',$imageName);
                $product->product_image = $imageName;
            }
            $product->product_link = $request->product_link;
            $product->save();

            $lang_id = getCurrentLanguageID();

            $productTranslation =  new ProductTranslation();
            $productTranslation->name = $request->name;
            $productTranslation->slug = Str::slug($request->name);
            $productTranslation->description = $request->description;
            $productTranslation->product_id  = $product->id;
            $productTranslation->language_id  = $lang_id;
            $productTranslation->save();
    
            $productCategorys = $request->product_category;
            $selectedCategories  = $request->selected_categories;

            $product->categories()->sync($selectedCategories ?: $productCategorys);
            // if (empty($selectedCategories)) {

            //     $product->categories()->sync($productCategorys);
            // } elseif (!empty($request->selected_categories)) {

            //     $product->categories()->sync($request->selected_categories);
            // } else {

            //     $product->categories()->sync([]);
            // }
    
            $product->keyFeatures()->delete(); 
            foreach ($keyFeatures as $feature) {
                $productkeyfeature = new ProductKeyFeature();
                
                $productkeyfeature->product_id = $product->id;
                $productkeyfeature->feature = $feature;
                $productkeyfeature->save();
            
                if($productkeyfeature){
                    $keyFeatureTranslation = ProductKeyFeatureTranslation::Create(
                        [
                            'product_key_id' => $productkeyfeature->id,
                            'language_id' => $lang_id,
                        ],
                        [
                            'feature' => $feature,
                        ]
                    );
                }
                
            }
            $message = isset($request->id) ? 'Product updated successfully' : 'Product added successfully';
            return redirect()->route('products')->with('success', $message);
        }
        
    }
    public function productEdit($id)
    {   
        $locale = getCurrentLocale();

        $lang_code = Language::where('lang_code', $locale)->first();

        if (!$lang_code) {
            return redirect()->back()->with('error', 'Server error: Language not found.');
        }
        $categories = Category::all();
        $product = Product::with('keyFeatures','categories.translations')->find($id);

        if ($lang_code) {
            $productTranslation = ProductTranslation::with([
                                                        'product.categories',
                                                        'language',
                                                        'product.keyFeatures.translations' => function($query) use ($lang_code) {
                                                            $query->where('language_id', $lang_code->id); 
                                                        },
                                                        'translations' => function($query) use ($lang_code) {
                                                            $query->where('language_id', $lang_code->id);  
                                                        }
                                                    ])
                                                    ->where('product_id', $id)  
                                                    ->where('language_id', $lang_code->id)  
                                                    ->first();
        } else {
            $productTranslation = Product::with('keyFeatures','categories')->find($id);
        }

        return view('Admin.products.add_product',compact('product','categories','productTranslation','siteLanguage'));
    }

    public function removeProduct($id)
    {
        $product = Product::find($id);
        if(!$product)
        {
            return redirect()->back()->with('error','product not found');
        }
        $product->delete();
        return redirect()->back()->with('success','product remove successfully');
    }
}
// main branch code 