<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('Admin.setting.country.index',compact('countries'));
    }

    public function update($id)
    {
        $countryid = Country::findOrFail($id);
        // dd($countryid);
        return view('Admin.setting.country.update',compact('countryid'));
    }

    public function updateProcc(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries',
        ]);
        try {
            $country = Country::findOrFail($request->id);
            $country->name = $request->name;
            $country->save();
            return redirect()->back()->with('success', 'Country updated successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Country not found.');
        }
    }

    public function add(){
        return view('Admin.setting.country.add');
    }

    public function addProcc(Request $request){
        $request->validate([
            'name' => 'required|unique:countries',
        ]);

        $country = new Country;
        $country->name = $request->name ?? '';
        $country->save();
        return redirect()->back()->with('success', 'Country added successfully.');
    }

    public function delete($id){
        Country::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Country delete successfull.');
    }

}