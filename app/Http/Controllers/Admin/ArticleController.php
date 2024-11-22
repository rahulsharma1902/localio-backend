<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;
use App\Models\SiteLanguages;
use App\Models\ArticleCategoryTranslation;
use App\Models\ArticleTranslation;
class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $locale = getCurrentLocale(); 
    
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();

        $articles = Article::with(['articleCategory', 'translations' => function ($query) use ($siteLanguage) {
                                                $query->where('language_id', $siteLanguage->id);
                                            }])->get();                    
        return view('Admin.article.index',compact('articles'));
    }

    public function articleEdit($id)
    {
        // Find the article by ID
        $article = Article::with('articleCategory')->findOrFail($id);

        // Retrieve all categories
        $categories = ArticleCategory::all();

        $locale = getCurrentLocale();
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();


        if (!$article) {
            return redirect()->back()->with('error', 'Article not found');
        }
        // If the language is not primary, fetch the translation for the article 
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $articleTranslation = ArticleTranslation::with('language')->where('article_id',$id)->where('language_id',$siteLanguage->id)->first();
        } else {
            // Use the main article  if no translation is available
            $articleTranslation = Article::where('id',$id)->first();
        }
        // Pass both article and  to the view
        return view('Admin.article.article_update', compact('article', 'categories','articleTranslation'));
    }

    public function add(Request $request)
    {
        $articleCategory = ArticleCategory::all();
    
        return view('Admin.article.add_article',compact('articleCategory'));
    }
    // add new article function

    public function addProcc(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|unique:articles,name',
            'description' => 'required', // No unique rule needed for description
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
            'category_id'   => 'required',
        ];

        // Validate the incoming request
        $validated = $request->validate($rules, [
            'image.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg, webp.',
        ]);

        // create a new article data
        $article  = new Article;
        $article->name = $request->name;
        $article->slug = Str::slug($request->name);
        $article->description = $request->description ?? '';
        $article->category_id  = $request->category_id;
        

        // Handle the image upload
        if ($request->hasFile('image')) {
            $articleImage = $request->file('image');
            $imageName = $article->slug . '-' . rand(0, 1000) . time() . '.' . $articleImage->getClientOriginalExtension();

            // Store the image in the public storage folder
            $articleImage->move(public_path().'/ArticleImages/',$imageName);
            $article->image = $imageName;
        }
        // Save the article and return response
        try {
            if ($article->save()) {
                return redirect()->back()->with('success', 'Article saved successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to save Article');
            }
        } catch (\Exception $e) {
            // Log the exception error for debugging purposes
            \Log::error('Error saving article: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the article.');
        }
    }

    // Article Update Function 

    public function articleUpdateProcc(Request $request)
    {   
   
        $siteLanguage = SiteLanguages::where('handle', $request->handle)->first();
 
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $request->validate([
                'name' => 'required' ,
                'description' => 'required',
            ]);
            if ($request->article_tr_id) {
                $article = ArticleTranslation::find($request->article_tr_id);
                
                if (!$article) {
                    return back()->withErrors(['message' => 'Article translation not found.']);
                }
            }else{
                    $existingTranslation = ArticleTranslation::where('id', $request->article_tr_id)
                    ->where('language_id', $siteLanguage->id)
                    ->first();

                if ($existingTranslation) {
                    $article = $existingTranslation;
                } else {
                    $article = new ArticleTranslation;
                    $article->article_id = $request->article_id;
                    $article->language_id = $siteLanguage->id;
               
                }
            }
        }
        else {
            $request->validate([
                'name' => 'required' ,
                'description' => 'required',
            ]);
            $article = Article::find($request->article_id);
          
            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = Str::slug($request->name) . rand(0, 1000) . time() . '.' . $extension;
                $featuredImage->move(public_path('/ArticleImages/'), $featuredImageName);
                $article->image = $featuredImageName;
            }
            $article->category_id    = $request->category_id  ?? '';
        }
        $article->name = $request->name ?? '';
        
        $article->slug = Str::slug($request->name) ?? '';
       
        $article->description = $request->description ?? '';

        $article->save();
        return redirect()->back()->with('success', 'Article updated successfully.');
    }

    // End Article Update function


    public function articleCategory()
    {
        $locale = getCurrentLocale(); 
    
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();

        $articleCategory = ArticleCategory::with(['translations' => function ($query) use ($siteLanguage) {
                                                $query->where('language_id', $siteLanguage->id);
                                            }])->get();
        // dd($articleCategory);

        return view('Admin.article.article_categories',compact('articleCategory'));

        
    }
    public function articleCategoryAdd()
    {
        return view('Admin.article.add_article_category');
    }
    public function articleCategoryAddProcc(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|unique:article_categories,name',
            'description' => 'required', // No unique rule needed for description
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
        ];

        // Validate the incoming request
        $validated = $request->validate($rules, [
            'image.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg, webp.',
        ]);

        // create a new articleCategory data

        $articleCategory  = new ArticleCategory;
        $articleCategory->name = $request->name;
        $articleCategory->slug = Str::slug($request->name);
        $articleCategory->description = $request->description ?? '';

        // Handle the image upload
        if ($request->hasFile('image')) {
            $articleCategoryImage = $request->file('image');
            $imageName = $articleCategory->slug . '-' . rand(0, 1000) . time() . '.' . $articleCategoryImage->getClientOriginalExtension();

            // Store the image in the public storage folder
            $articleCategoryImage->move(public_path().'/ArticleCategoryImages/',$imageName);
            $articleCategory->image = $imageName;
        }

        // Save the articleCategory and return response
        try {
            if ($articleCategory->save()) {
                return redirect()->back()->with('success', 'Article Category saved successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to save Article Category');
            }
        } catch (\Exception $e) {
            // Log the exception error for debugging purposes
            \Log::error('Error saving Article Category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the Article Category.');
        }
    }
    public function articleCategoryEdit($id)
    {
        $locale = getCurrentLocale();
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
    //     // Fetch the main article category
        $articleCategory = ArticleCategory::find($id);

        if (!$articleCategory) {
            return redirect()->back()->with('error', 'Article Category not found');
        }
        // If the language is not primary, fetch the translation for the article category
        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $articleTranslationCategory = ArticleCategoryTranslation::with('language')->where('article_category_id',$id)->where('language_id',$siteLanguage->id)->first();
            // dd($articleTranslationCategory);
        } else {
            // Use the main article category if no translation is available
            $articleTranslationCategory = ArticleCategory::where('id',$id)->first();
        }
        return view('Admin.article.article_category_update', compact('articleCategory', 'articleTranslationCategory'));
    }
    public function articleCategoryUpdate(Request $request) 
    {   
      
        $siteLanguage = SiteLanguages::where('handle', $request->handle)->first();

        if ($siteLanguage && $siteLanguage->primary !== 1) {
            $request->validate([
                'name' => 'required' ,
                'description' => 'required',
            ]);
            if ($request->article_tr_id) {
                $category = ArticleCategoryTranslation::find($request->article_tr_id);
                if (!$category) {
                    return back()->withErrors(['message' => 'Category translation not found.']);
                }
            }else{
                    $existingTranslation = ArticleCategoryTranslation::where('id', $request->article_tr_id)
                    ->where('language_id', $request->lang_id)
                    ->first();

                if ($existingTranslation) {
                    $category = $existingTranslation;
                } else {
                    $category = new ArticleCategoryTranslation;
                    $category->article_category_id = $request->article_ct_id;
               
                    $category->language_id = $siteLanguage->id;
               
                }
            }
        }
        else {
            $request->validate([
                'name' => 'required' ,
                'description' => 'required',
            ]);
            $category = ArticleCategory::find($request->article_ct_id) ?? new ArticleCategory;
            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = Str::slug($request->name) . rand(0, 1000) . time() . '.' . $extension;
                $featuredImage->move(public_path('/ArticleCategoryImages/'), $featuredImageName);
                $category->image = $featuredImageName;
            }
        }
        $category->name = $request->name ?? '';
        
        $category->slug = Str::slug($request->name) ?? '';
        
        $category->description = $request->description ?? '';

        $category->save();
        return redirect()->back()->with('success', 'Article updated successfully.');
    }
    
}
