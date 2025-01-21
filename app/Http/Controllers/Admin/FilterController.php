<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,CategoryTranslation,Filter,FilterOption,FilterTranslation,FilterOptionTranslation, Language};
use DB;
use Illuminate\Validation\Rule;

class FilterController extends Controller
{
    //
    public function index(Request $request){
        $getCurrentSiteLanguage = getCurrentSiteLanguage();
        $filters = Filter::with([
            'options.translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
            'translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
            'category.translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
        ])->get();
        return view('Admin.filters.index',compact('filters'));
    }
    public function add(Request $request){
        $categories = Category::where('status','active')->get();
        return view('Admin.filters.add',compact('categories'));
    }
    public function addProcc(Request $request) {
        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('filters', 'name')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                })
            ],
            'slug' => [
                'required',
                'string',
                Rule::unique('filters', 'slug')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                })
            ],
            'category_id' => 'required|exists:categories,id',
            'options' => 'required|array|min:1',
            'options.*' => 'required|string', 
        ]);
    
        // Debugging output
        // echo '<pre>';
        // print_r($request->all());
        // die();
    
        // Create a new filter entry
        $filter = new Filter;
        $filter->name = $request->name;
        $filter->slug = $request->slug;
        $filter->category_id = $request->category_id;
        $filter->save();
    
        // Get the options from the request
        $options = $request->options;
    
        // Loop through the options and save them
        foreach ($options as $optionName) {
            $option = new FilterOption();
            $option->filter_id = $filter->id;
            $option->name = $optionName;
            $option->save();
        }
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Filter and options added successfully.');
    }


    public function updateFilter(Request $request,$filterId){
        $getCurrentSiteLanguage = getCurrentSiteLanguage();
        $languageRole = getLanguageRole();

        $defaultFilter = Filter::where('id',$filterId)->first();
        $categories = Category::where('status','active')->get();
        $filter = Filter::where('id',$filterId)->with([
            'options.translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
            'translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
            'category.translations' => function ($query) use ($getCurrentSiteLanguage) {
                $query->where('language_id', $getCurrentSiteLanguage->id);
            },
        ])->first();
        return view('Admin.filters.update',compact('filter','defaultFilter','categories','languageRole'));
    }


    public function updateProcc(Request $request)
    {
        // Debugging output, can be removed
        // echo '<pre>';
        // print_r($request->all());
        // die();
    
        // Find the site language
        if ($request->language_id) {
            $lang_code = Language::where('id', $request->language_id)->first();
        } else {
            $lang_code = Language::where('lang_code', $request->lang_code)->first();
        }
    
        // Check if the language is a secondary language (not primary)
        if ($lang_code) {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'options' => 'required|array|min:1',
                'options.*' => 'required|string',
            ]);
    
            $filter = $request->id
                ? FilterTranslation::find($request->id)
                : FilterTranslation::where('filter_id', $request->filter_id)
                    ->where('language_id', $lang_code->id)
                    ->first() ?? new FilterTranslation;
    
            if (!$filter) {
                return back()->withErrors(['message' => 'Filter translation not found.']);
            }
    
            $filter->filter_id = $request->filter_id;
            $filter->language_id = $lang_code->id;
            $filter->name = $request->name;
            $filter->slug = $request->slug;
            $filter->save();
    
            foreach ($request->options as $optionKey => $optionValue) {
                $filterOption = FilterOptionTranslation::firstOrNew([
                    'filter_option_id' => $optionKey,
                    'language_id' => $lang_code->id,
                ]);
                $filterOption->name = $optionValue;
                $filterOption->save();
            }
        } 
        else {
            // Validation for primary language filters
            $request->validate([
                'name' => 'required|unique:filters,name,' . ($request->id ?? 'NULL') . ',id',
                'slug' => 'required|unique:filters,slug,' . ($request->id ?? 'NULL') . ',id',
                'category_id' => 'required|exists:categories,id',
                'options' => 'required|array|min:1',
                'options.*' => 'required|string',
                // 'new_options' => 'required|array|min:1',
                'new_options.*' => 'required|string',
            ]);
    
            DB::beginTransaction();
    
            try {
                $filter = Filter::findOrFail($request->id);
                $filter->name = $request->name;
                $filter->slug = $request->slug;
                $filter->category_id = $request->category_id;
                $filter->save();
    
                $siteLanguage = getCurrentSiteLanguage();
    
                $existingOptionIds = array_keys($request->options);
                $currentOptions = FilterOption::where('filter_id', $filter->id)->pluck('id')->toArray();
    
                foreach ($request->options as $optionId => $optionName) {
                    $optionTranslation = FilterOptionTranslation::firstOrNew([
                        'filter_option_id' => $optionId,
                        'language_id' => $siteLanguage->id,
                    ]);
                    $optionTranslation->name = $optionName;
                    $optionTranslation->save();
                }
    
                $optionsToRemove = array_diff($currentOptions, $existingOptionIds);

                if (!empty($optionsToRemove)) {
                    FilterOption::whereIn('id', $optionsToRemove)->delete();
                    FilterOptionTranslation::whereIn('filter_option_id', $optionsToRemove)->delete();
                }
    
                if($request->new_options){
                    foreach ($request->new_options as $newOptionName) {
                        $newOption = new FilterOption();
                        $newOption->filter_id = $filter->id;
                        $newOption->name = $newOptionName;
                        $newOption->save();
                    }
                }
                DB::commit();
    
            } catch (\Exception $e) {
                DB::rollBack();
               return redirect()->back()->with('error' , 'An error occurred: ');
            }

        }
    
        return redirect()->back()->with('success', 'Filter updated successfully.');
    }
    



    public function remove(Request $request,$id){
        $filter = Filter::find($id);
    
        if ($filter) {
            FilterTranslation::where('filter_id', $id)->delete();
            $filter->delete();
            return redirect()->back()->with('success', 'Filter and its translations removed successfully.');
        } else {
            return redirect()->back()->with('error', 'Filter not found.');
        }
    }
    
    
    
}
