<?php

namespace App\Http\Controllers\User\MetaPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteLanguages;
use App\Models\Faq;
use App\Models\WhoWeAre;
use App\Models\ExpertGuides;
use App\Models\PolicyTranslation;
use App\Models\ContactContent;
use App\Models\PageTile;
class MetaPagesController extends Controller
{
    public function expertGuide()
    {
        $expertGuide = ExpertGuides::first();
        $pageTileTranslationEducation = PageTile::where('source', 'educationItem')
        ->with('translations')
        ->get();
        $pageTileTranslationRightTools = PageTile::where('source', 'righttools')
            ->with('translations')
            ->get();
        return view('User.meta-pages.support.expert_guide',compact('expertGuide','pageTileTranslationEducation','pageTileTranslationRightTools'));
    }
    public function helpCenter()
    {
        $locale = getCurrentLocale();

        $faqs  = Faq::all();

        return view('User.meta-pages.support.help',compact('faqs'));
    }


    public function contact()
    {
        $contact = ContactContent::first();
        $pageTileTranslationRightTool = PageTile::where('source', 'right_tool_item')
        ->with('translations') // Eager load translations
        ->get();
        return view('User.meta-pages.support.contact',compact('contact','pageTileTranslationRightTool'));
    }

    public function whoWeAre()
    {
        $whoWeAre = WhoWeAre::first();

        $pageTileTranslationPopular = PageTile::where('source', 'popularItem')
        ->with('translations')
        ->get();
        // dd($pageTileTranslationPopular);
    $specilistTileTranslation = PageTile::where('source', 'specialists')
        ->with('translations')
        ->get();

        return view('User.meta-pages.site-pages.who_we_are',compact('whoWeAre','pageTileTranslationPopular','specilistTileTranslation'));
    }

    public function showPrivacyPolicy($id)
{
    $privacy_policy = PolicyTranslation::first();

    //dd($policy_data); // Debugging: Check if data is retrieved

    return view('User.terms_condition.privacy_policy', compact('privacy_policy'));
}

}
