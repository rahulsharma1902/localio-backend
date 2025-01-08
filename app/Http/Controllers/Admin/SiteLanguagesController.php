<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $countries = Country::all();
        return view('Admin/setting/siteLanguages/add', compact('countries'));
    }

    public function addProcc(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:site_languages,name',
            'handle' => 'required|alpha_dash|unique:site_languages,handle',
            'slug' => 'required|unique:site_languages,slug',
            'country_id' => 'required|exists:countries,id',
        ]);

        $siteLanguage = new SiteLanguages;
        $siteLanguage->name = $request->name ?? '';
        $siteLanguage->handle = $request->handle ?? '';
        $siteLanguage->slug = $request->slug ?? '';
        $siteLanguage->country_id = $request->country_id ?? '';

        $siteLanguage->save();

        return redirect()->back()->with('success', 'Site Language added successfully.');
    }


    public function update($id)
    {
        $siteLanguage = SiteLanguages::findOrFail($id);
        $countries = Country::all();
        return view('Admin.setting.siteLanguages.update', compact('siteLanguage', 'countries'));
    }
    public function updateProcc(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:site_languages,name,' . $request->id,
                'handle' => 'required|alpha_dash|unique:site_languages,handle,' . $request->id,
                'slug' => 'required|unique:site_languages,slug,' . $request->id,
                'country_id' => 'required|exists:countries,id',
            ]);
            try {
                $siteLanguage = SiteLanguages::findOrFail($request->id);
                $siteLanguage->name = $request->name;
                $siteLanguage->handle = $request->handle;
                $siteLanguage->slug = $request->slug;
                $siteLanguage->country_id = $request->country_id;
                $siteLanguage->save();
                return redirect()->back()->with('success', 'Site Language updated successfully.');
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Language not found.');
            }
        }


    public function setActiveSiteLanguage($handle){

            if($handle){
                $siteLanguage = SiteLanguages::where('handle',$handle)->first();
                if($siteLanguage){
                    Cookie::queue('language_code', $siteLanguage->handle, 60 * 24 * 30);
                    App::setLocale($siteLanguage->handle);
                    return redirect()->back();
                }
            }
            return redirect()->back()->with('error','Invalid error');
    }



}