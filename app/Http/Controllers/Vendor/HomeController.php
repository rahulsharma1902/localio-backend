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
        $metaTitleKey = "meta_Profile_title";
        $metaDescriptionKey = "meta_Profile_description";
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.vendor_profile', compact('metaTitle', 'metaDescription'));
    }
    // public function index()
    // {
    //     return view('vendor_dashboard_layout.master');
    // }
    public function dash(){
        $metaTitleKey = "meta_overview_title";
        $metaDescriptionKey = "meta_overview_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.dash', compact('metaTitle', 'metaDescription'));
    }
    public function addList(){
        $metaTitleKey = "meta_add_new_list_title";
        $metaDescriptionKey = "meta_add_new_list_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.add_new_list', compact('metaTitle', 'metaDescription'));
    }


    public function advertising(){
        $metaTitleKey = "meta_advertising_title";
        $metaDescriptionKey = "meta_advertising_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.advertising', compact('metaTitle', 'metaDescription'));
    }

    public function analytic(){
        $metaTitleKey = "meta_analitic_report_title";
        $metaDescriptionKey = "meta_analitic_report_title_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.analytics',compact('metaTitle', 'metaDescription'));
    }
    public function compaign(){
        $metaTitleKey = "meta_add_campaign_title";
        $metaDescriptionKey = "meta_add_campaign_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.campaign',compact('metaTitle', 'metaDescription'));
    }


    public function editList(){
        $metaTitleKey = "meta_edit_title";
        $metaDescriptionKey = "meta_edit_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';

        return view('vendor_dashboard.edit_listing', compact('metaTitle', 'metaDescription'));
    }

    public function m_Campaign(){
        $metaTitleKey = "meta_new_add_campaign_title";
        $metaDescriptionKey = "meta_new_add_campaign_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.M_campaign', compact('metaTitle', 'metaDescription'));
    }

    public function myListing(){
        return view('vendor_dashboard.my_listing', compact('metaTitle', 'metaDescription'));
    }

    public function review(){
        $metaTitleKey = "meta_vendor_review_title";
        $metaDescriptionKey = "meta_vendor_review_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.review', compact('metaTitle', 'metaDescription'));
    }

    public function reviewManagment(){
        $metaTitleKey = "meta_vendor_review_managment_title";
        $metaDescriptionKey = "meta_vendor_review_managment_description";

        // Fetch meta title and description from the database
        $metaTitle = HomeContent::where('meta_key', $metaTitleKey)->value('meta_value') ?? 'Default Title';
        $metaDescription = HomeContent::where('meta_key', $metaDescriptionKey)->value('meta_value') ?? 'Default Description';
        return view('vendor_dashboard.review_managment', compact('metaTitle', 'metaDescription'));
    }
}
