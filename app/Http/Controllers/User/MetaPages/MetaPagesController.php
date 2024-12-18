<?php

namespace App\Http\Controllers\User\MetaPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Faq;
use App\Models\SiteLanguages;
=======
use App\Models\SiteLanguages;
use App\Models\Faq;
>>>>>>> bd80246073b518778a92f0d8612fd5aedcb42df5
class MetaPagesController extends Controller
{
    public function expertGuide()
    {
        return view('User.meta-pages.support.expert_guide');
    }
    public function helpCenter()
    {
        $locale = getCurrentLocale();

        $siteLanguage = SiteLanguages::where('handle',$locale)->first();

        $faqs  = Faq::with(['translations' => function($query) use ($siteLanguage){
            
                        $query->where('language_id',$siteLanguage->id);
                        
                        }])->get();

        return view('User.meta-pages.support.help',compact('faqs'));
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
