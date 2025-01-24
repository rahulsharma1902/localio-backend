<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\ProductTranslation;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    
    public function products()
    {
        $lang_id = getCurrentLanguageID();
        $siteLanguage = Language::where('id',$lang_id)->first();
        $products = Product::with('categories')->get();
       return view('Admin.products.index',compact('products'));
    }
    public function productAdd()
    {
        $categories = Category::all();
        return view('Admin.products.add_product',compact('categories'));
    }
    public function productAddProccess(Request $request)    
    {   
        $language = Language::where('id',$request->lang_code)->first();
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'product_category' => 'required',  // Ensures category is selected and exists in categories table
            'product_price' => 'required|numeric',
            'product_icon' => 'required|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_image' => 'required|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'product_link' => 'required|url',
            'key_features' => 'required|array|min:1',
        ]);
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
            $procons_id =   DB::table('pro_cons')->insertGetId([
                'product_id' => $product->id,
                'lang_id' => $language_id,
                'type' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach($request->product_category as $value){
                DB::table('category_products')->insert([
                    'category_id' => $value,
                    'product_id' => $product->id
                ]);
            }    

            foreach($request->key_features as $value ){
                DB::table('pro_cons_translations')->insert([
                    'pro_cons_id' => $procons_id,
                    'name' => $value,
                    'description' => 'null',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return redirect()->route('products')->with('success', 'Product  added successfully');
        }else{
            return redirect()->route('products')->with('error', 'something went wrong !');
        }
    }
    public function productEdit($id)
    {   
        $pro_cons_id = DB::table('pro_cons')->where('product_id',$id)->value('id');
        $pro_cons_translations =  DB::table('pro_cons_translations')->where('pro_cons_id',$pro_cons_id)->get()->toArray();
        $categories = Category::all();
        $product = Product::with('keyFeatures','categories.translations')->find($id);
            $category_products = DB::table('category_products')
            ->where('product_id', $id)
            ->pluck('category_id')
            ->toArray();
            $cat_arr = Category::whereIn('id', $category_products)
            ->get(['id', 'name'])
            ->toArray();


        return view('Admin.products.update_product',compact('product','categories','cat_arr','pro_cons_translations'));
    }

    // public function productUpdateProccess(Request $request){
        
    //     // dd($request->key_features);
    //     $request->validate([
    //         'name' => 'required|string',
    //         'description' => 'required|string',
    //         'product_category' => 'required',  // Ensures category is selected and exists in categories table
    //         'product_price' => 'required|numeric',
    //         'product_icon' => 'nullable|file|mimes:jpeg,png,jpg,svg,webp|max:2048',
    //         'product_image' => 'nullable|file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
    //         'product_link' => 'required|url',
    //         'key_features' => 'required|array|min:1',
    //     ]);
    //     $language = Language::where('id',$request->lang_code)->first();
    //     if(!$language)
    //     {
    //         return redirect()->back()->with('error','current langauge not found');
    //     }

    //     if($language && isset($request->id))
    //     {
    //         $product = product::find($request->id);
    //         $product->name = $request->name;
    //         $product->slug = Str::slug($request->name);
    //         $product->description = $request->description;
    //         $product->product_price = $request->product_price;
    //         if($request->hasFile('product_icon'))
    //         {   
    //             $productIcon = $request->file('product_icon');
    //             $iconName = $product->slug . '-' . rand(0, 1000) . time() . '.' . $productIcon->getClientOriginalExtension();
    //             $productIcon->move(public_path().'/ProductIcon/',$iconName);
    //             $product->product_icon = $iconName;
    //         }
    //         if($request->hasFile('product_image'))
    //         {
    //             $productImage = $request->file('product_image');
    //             $imageName = $product->slug.'-'.rand(0,999).time().'.'.$productImage->getClientOriginalExtension();
    //             $productImage->move(public_path().'/ProductImage/',$imageName);
    //             $product->product_image = $imageName;
    //         }
    //         $product->product_link = $request->product_link;
    //         $product->update(); 
    //         $language_id = Language::where('lang_code','en-us')->value('id');
    //         $productTranslation =  ProductTranslation::where('product_id',$request->id)->update([
    //             'name' => $request->name,
    //             'slug' => Str::slug($request->slug),
    //             'description' => $request->description,
    //             'product_id' => $request->id,
    //             'language_id' => $language_id,
    //         ]);
    //         foreach ($request->key_features as $value) {
    //             $existing = DB::table('pro_cons_translations')->where('name', $value)->first();
    //             if ($existing) {
    //                 // If the value exists, update it
    //                 DB::table('pro_cons_translations')
    //                     ->where('name', $value)
    //                     ->update([
    //                         'updated_at' => now(), 
    //                 ]);
    //             } else {
    //                $procons_id =  DB::table('pro_cons')->where('product_id',$request->id)->value('id');
    //                 DB::table('pro_cons_translations')->insert([
    //                     'name' => $value,
    //                     'pro_cons_id' => $procons_id,
    //                     'description' => 'null',
    //                 ]);
    //             }
    //         }
            
    //         DB::table('category_products')->where('product_id',$product->id)->delete();
    //         foreach($request->product_category as $value){
    //             DB::table('category_products')->updateOrInsert(
    //                 ['product_id' => $product->id, 'category_id' => $value],
    //                 ['category_id' => $value] 
    //             );
    //         }
    //         if($productTranslation){
    //             return redirect()->route('products')->with('success', 'Product  update successfully');
    //         }else{
    //             return back()->with('error', 'something went wrong');
    //         }
    // }}

    public function productUpdateProccess(Request $request)
{
    // dd($request->key_features);
    
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
        'key_features' => 'required|array|min:1',
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


    // foreach ($request->key_features as $key => $value) {
    //     dd($request->key_features[$key]);
    // }


        $matched = []; 
        $notmatched = []; 
        $procons_id = DB::table('pro_cons')->where('product_id', $product->id)->value('id');

        if ($procons_id) {
             $existingTranslations = DB::table('pro_cons_translations')
        ->where('pro_cons_id', $procons_id)
        ->pluck('name') 
        ->toArray();
        // dd($existingTranslations);

    foreach ($request->key_features as $value) {
        $matched[] = $value;
        if (in_array($value, $existingTranslations)) {
            DB::table('pro_cons_translations')
            ->where('name', $value)->delete();
        }else{
            $notmatched[] = $value;
        }
    }
dd($notmatched);

   
       
}

        DB::table('category_products')->where('product_id', $product->id)->delete();
        foreach ($request->product_category as $value) {
            DB::table('category_products')->updateOrInsert(
                ['product_id' => $product->id, 'category_id' => $value],
                ['category_id' => $value]
            );
        }
    return redirect()->route('products')->with('success', 'Product updated successfully');
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