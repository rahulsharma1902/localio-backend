<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductFeatureTranslate;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFetureController extends Controller
{
    public function index()
    {
        $lang_id = getCurrentLanguageID();
        $siteLanguage = Language::where('id', '1')->first();
        $products_feature = ProductFeatureTranslate::all()->toArray();
        return view('Admin.product-feature.index', compact('products_feature'));
    }

    public function add()
    {
        return view('Admin.product-feature.add');
    }
    public function add_process(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_features_translation',
        ]);

        $productfeatureid =   ProductFeature::create([
            'lang_id' => 1,
            'type' => $request->tab,
            'status' => 'active'
        ])->id;

        $product_translate_feture =  DB::table('product_features_translation')->insert([
            'name' => $request->name,
            'product_feture_id' => $productfeatureid,
            'status' => 'active'
        ]);

        if ($product_translate_feture) {
            return redirect()->back()->with('success', 'successfull created Prodcut Feature');
        } else {
            return redirect()->back()->with('error', 'Some thing Went Wrong !');
        }
    }

    public function update($id)
    {
        $producttranslation = ProductFeatureTranslate::where('id', $id)->first()->toArray();
        return view('Admin.product-feature.update', compact('producttranslation'));
    }

    public function update_process(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $name = ProductFeatureTranslate::where('id', $request->feture_translate_id)->update([
            'name' => $request->name
        ]);
        if ($name) {
            return redirect()->route('productfeature.index')->with('success', 'Successfull updated');
        } else {
            return redirect()->back()->with('error', 'Some thing went wrong');
        }
    }

    public function remove($id)
    {
        $producttranslate = ProductFeatureTranslate::where('id', $id)->first();
        if (!$producttranslate) {
            return redirect()->back()->with('error', 'Translation record not found.');
        }
        $product_feture_id = $producttranslate->product_feture_id;
        $productFeature = ProductFeature::where('id', $product_feture_id)->first();
        if (!$productFeature) {
            return redirect()->back()->with('error', 'Product feature not found.');
        }
        $productFeature->delete();
        $data = ProductFeatureTranslate::where('id', $id)->delete();
        if ($data) {
            return redirect()->back()->with('success', 'Translation and associated product feature deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Error occurred while deleting the translation.');
        }
    }
}
