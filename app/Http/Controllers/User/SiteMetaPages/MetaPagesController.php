<?php

namespace App\Http\Controllers\User\SiteMetaPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetaPagesController extends Controller
{
    public function expertGuide()
    {
        return view('User.meta-pages.support.expert_guide');
    }
    public function helpCenter()
    {
        return view('User.meta-pages.support.help');
    }
    public function contact()
    {
        return view('User.meta-pages.support.contact');
    }

    public function whoWeAre()
    {
        return view('User.meta-pages.site-pages.who_we_are');
    }

}
