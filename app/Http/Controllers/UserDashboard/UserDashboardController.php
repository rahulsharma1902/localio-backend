<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function userAccount(){
        return view('user_dashboard.user_account');
    }

    public function userProduct(){
        return view('user_dashboard.user_product');
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
