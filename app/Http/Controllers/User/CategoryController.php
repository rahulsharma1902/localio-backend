<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

use App\Models\SiteLanguages;
use App\Models\CategoryPageContent;
class CategoryController extends Controller
{
    //
    public function index()
    {
        $lang = Session::get('current_lang');
        $lang_id = getCurrentLanguageID();
        $categoryImages = CategoryPageContent::where('lang_id', 1)
            ->WhereIn('meta_key', ['header_image', 'header_bg_image'])
            ->get();
        $headerImage = $categoryImages->where('meta_key', 'header_image')->first();
        $backgroundImage = $categoryImages->where('meta_key', 'header_bg_image')->first();
        
        $categoriesContents = \App\Models\CategoryPageContent::where('lang_id', $lang_id)->where('type', 'text')->pluck('meta_value', 'meta_key');
        if ($categoriesContents->isEmpty()) {
            $categoriesContents = \App\Models\CategoryPageContent::where('lang_id', 1)->where('type', 'text')->pluck('meta_value', 'meta_key');
        }
     
        $categories = Category::all(); 

        return view('User.category.index',compact('categories','categoriesContents','categoryImages','backgroundImage','headerImage'));
    } 
}
