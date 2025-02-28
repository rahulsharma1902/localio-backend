<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\HomeContent;
use Illuminate\Support\Str;



class UserDashboardController extends Controller
{
    public function userAccount(){
        $metaTitleKey = "meta_user_dashboard_title";
        $metaDescriptionKey = "meta_user_dashboard_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('user_dashboard.user_account', compact('metaTitle', 'metaDescription'));
    }

    public function userProduct(){
        $metaTitleKey = "meta_user_product_title";
        $metaDescriptionKey = "meta_user_product_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        $userId = Auth::id(); // Get logged-in user ID

        if (!$userId) {
            return redirect()->route('login')->with('error', 'You need to log in first!');
        }

        $wishlistItems = Wishlist::where('user_id', $userId)
            ->with('product','prices')
            ->get();

        return view('user_dashboard.user_product', compact('wishlistItems','metaTitle', 'metaDescription'));

    }

    public function userProfile(){
        $metaTitleKey = "meta_user_profile_title";
        $metaDescriptionKey = "meta_user_profile_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';

        return view('user_dashboard.user_profile', compact('metaTitle', 'metaDescription'));
    }

    public function userReview(){
        $metaTitleKey = "meta_user_review_title";
        $metaDescriptionKey = "meta_user_review_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';

        return view('user_dashboard.user_review', compact('metaTitle', 'metaDescription'));
    }

    public function userReward(){
        $metaTitleKey = "meta_user_reward_title";
        $metaDescriptionKey = "meta_user_reward_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';

        return view('user_dashboard.user_reward', compact('metaTitle', 'metaDescription'));
    }



}
