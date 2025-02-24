<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;


class UserDashboardController extends Controller
{
    public function userAccount(){
        return view('user_dashboard.user_account');
    }

    public function userProduct(){
        $userId = Auth::id(); // Get logged-in user ID

        if (!$userId) {
            return redirect()->route('login')->with('error', 'You need to log in first!');
        }

        // Fetch wishlist products with their details
        $wishlistItems = Wishlist::where('user_id', $userId)
            ->with('product','prices') // Assuming there's a 'product' relation in Wishlist Model
            ->get();

        return view('user_dashboard.user_product', compact('wishlistItems'));

    }

    public function userProfile(){
        return view('user_dashboard.user_profile');
    }

    public function userReview(){
        return view('user_dashboard.user_review');
    }

    public function userReward(){
        return view('user_dashboard.user_reward');
    }


}
