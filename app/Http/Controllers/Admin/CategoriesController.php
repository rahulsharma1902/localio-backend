<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SiteLanguages,CategoryTranslation};
use Cookie;
use App;
use Session;
class CategoriesController extends Controller
{
   

    public function index(Request $request) {
        $locale = getCurrentLocale(); 

        // $locale = Session::get('current_lang');
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
        
        $categories = Category::with(['translations' => function ($query) use ($siteLanguage) {
            $query->where('language_id', $siteLanguage->id);
        }])->get();
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

            if (!in_array(strtolower($extension), ['png', 'jpg', 'svg'])) {
                return redirect()->back()->with('error', 'Only PNG, JPG, and SVG images are allowed.');
            }
            $featuredImageName = $request->slug.rand(0,1000).time().'.'.$extension;;
            $featuredImage->move(public_path().'/CategoryImages/',$featuredImageName);
            
            $category->image = $featuredImageName;    
        }
        if ($request->hasFile('category_icon')) {
            $featuredImage = $request->file('category_icon');
            $extension = $featuredImage->getClientOriginalExtension();
            if (!in_array(strtolower($extension), ['png', 'jpg', 'svg'])) {
                return redirect()->back()->with('error', 'Only PNG, JPG, and SVG icons are allowed.');
            }
            $featuredIconName = $request->slug.rand(0,1000).time().'.'.$extension;;
            $featuredImage->move(public_path().'/CategoryIcon/',$featuredIconName);
            
            $category->category_icon = $featuredIconName;    
        }

        if ($category->save()) {
            // return response()->json(['message' => 'Category saved successfully'], 200);
            return redirect()->back()->with('success','Category saved successfully');
        } else {
            // return response()->json(['message' => 'Failed to save category'], 500);
            return redirect()->back()->with('error','Failed to save category');

        }
    }

    public function updateCategory($categoryId){
    
        $locale = getCurrentLocale();
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
        $defaultCategory = Category::where('id',$categoryId)->first();
  
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $category = CategoryTranslation::with('language')->where('category_id',$categoryId)->where('language_id',$siteLanguage->id)->first();
            // dd($category);
        } else {
            $category = Category::where('id',$categoryId)->first();
        }
        // echo '<pre>';
        // print_r($siteLanguage->handle);
        // die();
        return view('Admin.categories.update',compact('category','defaultCategory'));

    }

    public function updateProcc(Request $request) {
      
        $siteLanguage = SiteLanguages::where('handle', $request->handle)->first();
        
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $request->validate([
                'name' => 'required|unique:category_translations,name' . ($request->id ? ',' . $request->id : ''),
                'slug' => 'required|unique:category_translations,slug' . ($request->id ? ',' . $request->id : ''),
            ]);
            
            if ($request->id) {
                $category = CategoryTranslation::find($request->id);
                if (!$category) {
                    return back()->withErrors(['message' => 'Category translation not found.']);
                }
            } else {
                $existingTranslation = CategoryTranslation::where('category_id', $request->category_id)
                    ->where('language_id', $siteLanguage->id)
                    ->first();
                if ($existingTranslation) {
                    $category = $existingTranslation;
                } else {
                    $category = new CategoryTranslation;
                    $category->category_id = $request->category_id;
                    $category->language_id = $siteLanguage->id;
                }
            }
        } 
        else {
            $request->validate([
                'name' => 'required|unique:categories,name' . ($request->id ? ',' . $request->id : ''),
                'slug' => 'required|unique:categories,slug' . ($request->id ? ',' . $request->id : ''),
            ]);
            $category = Category::find($request->id) ?? new Category;
    
            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = $request->slug . rand(0, 1000) . time() . '.' . $extension;
                $featuredImage->move(public_path('/CategoryImages/'), $featuredImageName);
    
                $category->image = $featuredImageName;
            }
            if ($request->hasFile('category_icon')) {
                $featuredImage = $request->file('category_icon');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredIconName = $request->slug.rand(0,1000).time().'.'.$extension;;
                $featuredImage->move(public_path().'/CategoryIcon/',$featuredIconName);
                
                $category->category_icon = $featuredIconName;    
            }
    
        }
        $category->name = $request->name ?? '';
        $category->slug = $request->slug ?? '';
        $category->description = $request->description ?? '';
    
        $category->save();
    
        return redirect()->back()->with('success', 'Category updated successfully.');
    }


    public function remove(Request $request, $id) {
        $category = Category::find($id);
    
        if ($category) {
            CategoryTranslation::where('category_id', $id)->delete();
            $category->delete();
            return redirect()->back()->with('success', 'Category and its translations removed successfully.');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
    
    
}