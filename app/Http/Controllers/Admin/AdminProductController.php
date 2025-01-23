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
        $lang_id = getCurrentLanguageID();
        $siteLanguage = Language::where('id',$lang_id)->first();
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
        // dd($request->all());
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
        $language = Language::where('id',$request->lang_code)->first();
        if(!$language)
        {
            return redirect()->back()->with('error','current langauge not found');
        }

        if($language)
        {
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
            $language_id = Language::where('lang_code','en-us')->value('id');
            $productTranslation =  new ProductTranslation();
            $productTranslation->name = $request->name;
            $productTranslation->slug = Str::slug($request->name);
            $productTranslation->description = $request->description;
            $productTranslation->product_id  = $product->id;
            $productTranslation->language_id  = $language_id;
            $productTranslation->save();

            return redirect()->route('products')->with('success', 'Product  added successfully');
        }else{
            return redirect()->route('products')->with('error', 'something went wrong !');
        }
    }
    public function productEdit($id)
    {   
        // dd($id);
        $locale = getCurrentLanguageID();
        // dd($locale);

        $lang_code = Language::where('id', $locale)->first();

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
        return view('productup',compact('product','categories','productTranslation'));
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