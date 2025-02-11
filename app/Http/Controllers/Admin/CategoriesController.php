<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Language, CategoryTranslation, SiteLanguages};
use Cookie;
use App;
use Session;

class CategoriesController extends Controller
{


    public function index(Request $request)
    {
        // $locale = session()->get('lang_code');
        $locale = app()->getLocale();
        $siteLanguage = Language::where('lang_code', $locale)->first();
        $categories = collect();
        if ($siteLanguage) {
            $categories = CategoryTranslation::where('language_id', $siteLanguage->id)->get();
        }
        return view('Admin.categories.index', compact('categories'));
    }


    public function add()
    {
        return view('Admin.categories.add');
    }

    public function add_process(Request $request)
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
            $featuredImageName = $request->slug . rand(0, 1000) . time() . '.' . $extension;;
            $featuredImage->move(public_path() . '/CategoryImages/', $featuredImageName);
            $category->image = $featuredImageName;
        }
        if ($request->hasFile('category_icon')) {
            $featuredIcon = $request->file('category_icon');
            $IconExtension = $featuredIcon->getClientOriginalExtension();
            if (!in_array(strtolower($IconExtension), ['png', 'jpg', 'svg'])) {
                return redirect()->back()->with('error', 'Only PNG, JPG, and SVG icons are allowed.');
            }
            $featuredIconName = $request->slug . rand(0, 1000) . time() . '.' . $IconExtension;;
            $featuredIcon->move(public_path() . '/CategoryIcon/', $featuredIconName);

            $category->category_icon = $featuredIconName;
        }

        if ($category->save()) {
            $translation = $category->translations()->updateOrCreate(
                ['language_id' => 1],
                [
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'description' => $category->description,
                ]
            );
            if (!$translation) {
                return redirect()->route('category')->with('error', 'Failed to save category translation.');
            }
            return redirect()->route('categories')->with('success', 'Category saved successfully');
        } else {
            return redirect()->route('categories')->with('error', 'Failed to save category');
        }
    }



    public function updateCategory($categoryId)
    {
        $locale = getCurrentLocale();
        $lang_code = Language::where('lang_code', $locale)->first();

        if ($lang_code) {
            $defaultCategory = Category::find($categoryId);
            $category = CategoryTranslation::with('language')->where('language_id', $lang_code->id)->where('category_id', $categoryId)->first();
            if (!$category) {
                return redirect()->back()->with('error', 'Category is Not Translated in this Language');
            }
            return view('Admin.categories.update', compact('category', 'defaultCategory'));
        } else {
            return redirect()->back()->with('error', 'Category is Not Found');
        }
    }


    public function updateProcc(Request $request)
    {
        $locale = getCurrentLocale();
        $lang_code = Language::where('lang_code', $locale)->first();
        $category_id = CategoryTranslation::where('id', $request->id)->value('category_id');
        if ($lang_code) {
            CategoryTranslation::where('id', $request->id)->update(
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description
                ]
            );

            $category = Category::find($category_id);


            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = $request->slug . rand(0, 1000) . time() . '.' . $extension;
                $featuredImage->move(public_path('/CategoryImages/'), $featuredImageName);
                $category->image = $featuredImageName;
            }

            if ($request->hasFile('category_icon')) {
                $featuredIcon = $request->file('category_icon');
                $IconExtension = $featuredIcon->getClientOriginalExtension();
                $featuredIconName = $request->slug . rand(0, 1000) . time() . '.' . $IconExtension;;
                $featuredIcon->move(public_path() . '/CategoryIcon/', $featuredIconName);
                $category->category_icon = $featuredIconName;
            }

            $category->update();
            return redirect()->route('categories')->with('success', 'Category update successfully !');
        }
    }

    public function remove(Request $request, $id)
    {
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
