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
    public function index()
    {
        $siteLanguages = Language::where('status',1)->get();
       
        return view('Admin.setting.siteLanguages.index',compact('siteLanguages'));
    }


    public function add(){
        $countries = Country::all();
        return view('Admin.setting.siteLanguages.add', compact('countries'));
    }

    public function addProcc(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:languages,name',
            'lang_code' => 'required|alpha_dash|unique:languages,lang_code',
            'country_id' => 'required|exists:countries,id',
        ]);
        $is_valid = website_translator('translate this content',$request->lang_code);
        if($is_valid != false && $is_valid != 0 && $is_valid != null) {
            $siteLanguage = new Language;
            $siteLanguage->name = $request->name;
            $siteLanguage->lang_code = $request->lang_code;
            $siteLanguage->country_id = $request->country_id;
            $siteLanguage->save();
            return redirect()->back()->with('success', 'Site Language updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Incorrect language code');
        }

        return redirect()->back()->with('success', 'Site Language added successfully.');
    }


    public function update($id)
    {
        $siteLanguage = Language::findOrFail($id);
        $countries = Country::all();
        return view('Admin.setting.siteLanguages.update', compact('siteLanguage', 'countries'));
    }
    public function updateProcc(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:languages,name,' . $request->id,
            'lang_code' => 'required|alpha_dash|unique:languages,lang_code,' . $request->id,
            'country_id' => 'required|exists:countries,id',
        ]);
        try {
            $is_valid = website_translator('translate this content',$request->lang_code);
            if($is_valid != false && $is_valid != 0 && $is_valid != null) {
                $siteLanguage = Language::findOrFail($request->id);
                $siteLanguage->name = $request->name;
                $siteLanguage->lang_code = $request->lang_code;
                $siteLanguage->country_id = $request->country_id;
                $siteLanguage->save();
                return redirect()->back()->with('success', 'Site Language updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Incorrect language code');
            }
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Language not found.');
        }
    }


    public function setActiveSiteLanguage($lang_code)
    {

        if($lang_code){
            $siteLanguage = Language::where('lang_code',$lang_code)->first();
            if($siteLanguage){
                Cookie::queue('lang_code', $siteLanguage->lang_code, 60 * 24 * 30);
                session(['lang_id' => $siteLanguage->id]);
                    Cookie::queue('lang_id', $siteLanguage->id, 60 * 24 * 30);
                session(['lang_code' => $siteLanguage->lang_code]);
                App::setLocale($siteLanguage->lang_code);
                return redirect()->back();
            }else{
                return redirect()->back()->with('error','Invalid error');

            }
        }
        return redirect()->back()->with('error','Invalid error');
    }



}