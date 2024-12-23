<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use App\Models\SiteLanguages;
use App\Models\CategoryPageContent;
class CategoryController extends Controller
{
    //
    public function index()
    {
        $lang = Session::get('current_lang');

        // $categories = Category::all();
    
        $siteLanguage = SiteLanguages::where('handle', $lang)->first();
        
        $categories = Category::with(['translations' => function ($query) use ($siteLanguage) {
            $query->where('language_id', $siteLanguage->id);
        }])->get();
     
        return view('User.category.index',compact('categories'));
    }
}
