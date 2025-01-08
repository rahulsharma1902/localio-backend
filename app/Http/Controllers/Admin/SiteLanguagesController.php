<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\{Country,Language,SiteLanguages};
use Cookie;
use App;
class SiteLanguagesController extends Controller
{
    //
    public function index(){
        $siteLanguages = SiteLanguages::with('country','language')->get();
        // echo '<pre>';
        // print_r($siteLanguages);
        // die();

        return view('Admin/setting/siteLanguages/index',compact('siteLanguages'));
    }


    public function add(){
        $languages = Language::all();
        $countries = Country::all();
        return view('Admin/setting/siteLanguages/add', compact('countries','languages'));
    }

    public function addProcc(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:site_languages,name',
            'handle' => 'required|alpha_dash|unique:site_languages,handle',
            'slug' => 'required|unique:site_languages,slug',
            'country_id' => 'required|exists:countries,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        $siteLanguage = new SiteLanguages;
        $siteLanguage->name = $request->name ?? '';
        $siteLanguage->handle = $request->handle ?? '';
        $siteLanguage->slug = $request->slug ?? '';
        $siteLanguage->country_id = $request->country_id ?? '';
        $siteLanguage->language_id = $request->language_id ?? '';

        $siteLanguage->save();

        return redirect()->back()->with('success', 'Site Language added successfully.');
    }


    public function update($id)
    {
        $siteLanguage = SiteLanguages::findOrFail($id);
        $languages = Language::all();
        $countries = Country::all();

        return view('Admin.setting.siteLanguages.update', compact('siteLanguage', 'countries', 'languages'));
    }
    public function updateProcc(Request $request)
{
    $request->validate([
        'name' => 'required|unique:site_languages,name,' . $request->id,
        'handle' => 'required|alpha_dash|unique:site_languages,handle,' . $request->id,
        'slug' => 'required|unique:site_languages,slug,' . $request->id,
        'country_id' => 'required|exists:countries,id',
        'language_id' => 'required|exists:languages,id',
    ]);

    try {
        $siteLanguage = SiteLanguages::findOrFail($request->id);
        $siteLanguage->name = $request->name;
        $siteLanguage->handle = $request->handle;
        $siteLanguage->slug = $request->slug;
        $siteLanguage->country_id = $request->country_id;
        $siteLanguage->language_id = $request->language_id;
        $siteLanguage->save();

        return redirect()->back()->with('success', 'Site Language updated successfully.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Language not found.');
    }
}


    // public function remove($id){
    //     if($id){
    //         try {
    //             $siteLanguage = SiteLanguages::findOrFail($id);
    //             if($siteLanguage->primary == 1){
    //                 return redirect()->back()->with('error','You can not delete primary language.');
    //             }
    //             $siteLanguage->delete();

    //             return redirect()->back()->with('success', 'Site Language removed successfully.');
    //         } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //             return redirect()->back()->with('error', 'Site Language not found.');
    //         }
    //     }
    // }



    public function setActiveSiteLanguage($lang_code){

            if($lang_code){
                $siteLanguage = Language::where('lang_code',$lang_code)->first();
                if($siteLanguage){
                    Cookie::queue('lang_code', $siteLanguage->lang_code, 60 * 24 * 30);
                    Cookie::queue('lang_id', $siteLanguage->id, 60 * 24 * 30);
                    session(['lang_code' => $siteLanguage->lang_code]);
                    session(['lang_id' => $siteLanguage->id]);
                    App::setLocale($siteLanguage->lang_code);
                    return redirect()->back();
                }else{
                    return redirect()->back()->with('error','Invalid error');

                }
            }
            return redirect()->back()->with('error','Invalid error');
    }



}
