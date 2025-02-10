<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;
use App\Models\SiteLanguages;
use Illuminate\Support\Facades\Session;
use App\Models\Rule;
class TermAndConditionController extends Controller
{
    //
    public function privacyPolicy()
    {

        $lang = Session::get('current_lang');


        // $siteLanguage = SiteLanguages::where('handle', $lang)->first();


        // $policies = Policy::with(['translations' => function ($query) use ($siteLanguage){
        //                     $query->where('language_id',$siteLanguage->id);
        //                     }])->where('title','Privacy Policy')->get();        
                            
        // $privacyPolicy = Policy::where('title','Privacy Policy')->first();
        // dd($privacyPolicy);

        // $rules = Rule::with(['translations' => function ($query) use ($siteLanguage){
        //                 $query->where('language_id', $siteLanguage->id);
        //                 }])->where('policy_id' ,$privacyPolicy->id)->get();          

        return view('User.terms_condition.privacy_policy');
    }
    public function termsCondtion()
    {
        $lang = Session::get('current_lang');
        // dd($lang);
        // $siteLanguage = SiteLanguages::where('handle', $lang)->first();

        // $policies = Policy::with(['translations' => function ($query) use (){
        //                     $query->where('language_id',1);
        //                     }])->where('title','Terms and Conditions')->get();        
                            
        // $terms= Policy::where('title','Terms and Conditions')->first();

        // $rules = Rule::with(['translations' => function ($query) use ($siteLanguage){
        //                 $query->where('language_id', $siteLanguage->id);
        //                 }])->where('policy_id' ,$terms->id)->get();        
        return view('User.terms_condition.terms_condition');
    }
}
