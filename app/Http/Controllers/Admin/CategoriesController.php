<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Language, CategoryTranslation};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App;
use Session;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $siteLanguage = Language::where('lang_code', $locale)->first();
        $categories = collect();
        if ($siteLanguage) {
            $categories = CategoryTranslation::where('language_id', $siteLanguage->id)->get();
        }
        return view('Admin.categories.index', compact('categories'));
    }

    public function add($id = null)
    {
        if($id != null){
            $category_data = Category::where('id',$id)->first()->toArray();
            return view('Admin.categories.add',compact('category_data'));
        }else{
            return view('Admin.categories.add');
        }
    }

    public function add_process(Request $request)
    {
        $rules = [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => 'required|string|min:10',
            'image' => 'nullable|image',
            'category_icon' => 'nullable|image',
        ];

        if (!$request->category_id) {
            $rules['name'][] = 'unique:categories,name';
        } else {
            $rules['name'][] = 'unique:categories,name,' . $request->category_id;
        }

        $validate = $request->validate($rules);

        $category = $request->category_id ? Category::find($request->category_id) : null;

        $slug = Str::slug($validate['name']);
        $originalSlug = $slug;
        $count = 1;

        while (Category::where('slug', $slug)->where('id', '!=', $request->category_id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $data = [
            'name' => $validate['name'],
            'description' => $validate['description'],
            'slug' => $slug
        ];

        if ($request->hasFile('image')) {
            if ($category && $category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $imageName = $slug . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('CategoryImages'), $imageName);
            $data['image'] = 'CategoryImages/' . $imageName;
        }

        if ($request->hasFile('category_icon')) {
            if ($category && $category->category_icon && file_exists(public_path($category->category_icon))) {
                unlink(public_path($category->category_icon));
            }

            $iconName = $slug . '_' . time() . '.' . $request->file('category_icon')->getClientOriginalExtension();
            $request->file('category_icon')->move(public_path('CategoryIcon'), $iconName);
            $data['category_icon'] = 'CategoryIcon/' . $iconName;
        }

        $category = Category::updateOrCreate(
            ['id' => $request->category_id],
            $data
        );

        if ($category) {
            CategoryTranslation::updateOrCreate(
                ['category_id' => (int) $category->id],
                [
                    'language_id' => 1,
                    'name' => $validate['name'],
                    'description' => $validate['description'],
                    'slug' => $slug
                ]
            );

            return redirect()->route('categories')->with('success', 'Category saved successfully');
        }
            else {
                return redirect()->route('categories')->with('error', 'Failed to save the category.');
            }

    }

    public function remove(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($category->image && File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }

            if ($category->category_icon && File::exists(public_path($category->category_icon))) {
                File::delete(public_path($category->category_icon));
            }

            CategoryTranslation::where('category_id', $id)->delete();
            $category->delete();

            return redirect()->back()->with('success', 'Category and its translations removed successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
