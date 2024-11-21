<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function vendorGetListed()
    {
        return view('Vendor.vendor_get_listed');
    }
}
