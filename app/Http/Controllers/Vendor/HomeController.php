<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function vendorGetListed()
    {

        return view('Vendor.vendor_get_listed');
    }
    public function vendorProfile()
    {

        return view('vendor_dashboard.vendor_profile');
    }

    public function dash(){

        return view('vendor_dashboard.dash');
    }
    public function addList(){

        return view('vendor_dashboard.add_new_list');
    }


    public function advertising(){

        return view('vendor_dashboard.advertising');
    }

    public function analytic(){

        return view('vendor_dashboard.analytics');
    }
    public function compaign(){

        return view('vendor_dashboard.campaign');
    }


    public function editList(){

        return view('vendor_dashboard.edit_listing');
    }

    public function m_Campaign(){
        return view('vendor_dashboard.M_campaign');
    }

    public function myListing(){
        return view('vendor_dashboard.my_listing');
    }

    public function review(){

        return view('vendor_dashboard.review');
    }

    public function reviewManagment(){

        return view('vendor_dashboard.review_managment');
    }
}
