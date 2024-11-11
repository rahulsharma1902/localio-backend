<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SiteLanguages,CategoryTranslation};
use Cookie;
use App;
class CategoriesController extends Controller
{
   
    public function index(Request $request) {
        $locale = getCurrentLocale();
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
    
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $categories = CategoryTranslation::all();
        } else {
            $categories = Category::all();
        }
        // echo '<pre>';
        // print_r($categories);
        // die();
        return view('Admin.categories.index', compact('categories'));
    }
    
    
    public function add(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories,name' . ($request->id ? ',' . $request->id : ''),
            'slug' => 'required|unique:categories,slug' . ($request->id ? ',' . $request->id : ''),
        ];

        if ($request->hasFile('images')) {
            $rules['images.*'] = 'required|image|mimes:jpeg,png,jpg,svg,webp';
        }

        $request->validate($rules, [
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg, webp.',
        ]);

        if ($request->id) {
            $category = Category::find($request->id);

            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }
        } else {
            $category = new Category;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description ?? '';

        if ($request->hasFile('image')) {
            $featuredImage = $request->file('image');
            $extension = $featuredImage->getClientOriginalExtension();
            $featuredImageName = $request->slug.rand(0,1000).time().'.'.$extension;;
            $featuredImage->move(public_path().'/CategoryImages/',$featuredImageName);
            
            $category->image = $featuredImageName;    
        }

        if ($category->save()) {
            // return response()->json(['message' => 'Category saved successfully'], 200);
            return redirect()->back()->with('success','Category saved successfully');
        } else {
            // return response()->json(['message' => 'Failed to save category'], 500);
            return redirect()->back()->with('error','Failed to save category');

        }
    }

    public function updateCategory($categoryId,$languageId=null){
        $locale = getCurrentLocale();
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $category = CategoryTranslation::with('language','category')->where('id',$categoryId)->first();
            // $defaultCategory = Category::where('id',$category->category_id)->first();


        } else {
            $category = Category::where('id',$categoryId)->first();
            // $defaultCategory = Category::where('id',$categoryId)->first();

        }
        return view('Admin.categories.update',compact('category'));

    }

    public function updateProcc(Request $request){
        echo '<pre>';
        print_r($request->all());
        die();
    }

}
