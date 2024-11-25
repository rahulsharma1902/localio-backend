<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;
use App\Models\SiteLanguages;
use App\Models\PolicyTranslation;
use App\Models\Rule;
use Illuminate\Support\Str;
use App\Models\RuleTranslation;
class SitePagesController extends Controller
{
    //
   
    public function policies()
    {   
        $locale = getCurrentLocale();
  
    
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();

        $policies = Policy::with(['translations' => function ($query) use ($siteLanguage) {
                                                $query->where('language_id', $siteLanguage->id);
                                            }])->get();                    

        return view('Admin.policy.index',compact('policies'));
    }
    public function policyEdit($id)
    {
        $locale = getCurrentLocale();

        $policy = Policy::find($id);
    
        // Ensure the policy exists
        if (!$policy) {
            return redirect()->back()->with('error', 'Policy not found');
        }
    
        // Fetch the site language
        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
    
        // Check if site language exists
        if ($siteLanguage) {
            // If the language is not primary, fetch the translation for the policy
            if ($siteLanguage->primary !== 1) {
                $policiesTranslation = PolicyTranslation::with('language')->where('policy_id', $id)
                                                         ->where('language_id', $siteLanguage->id)
                                                         ->first();
            } else {
                // If it's the primary language or no translation found, use the main policy
                $policiesTranslation = null;
            }
        } 
        else {
            // Handle the case when no matching site language is found
            $policiesTranslation = null;
        }

        // Return the view with policy and its translation
        return view('Admin.policy.add-policy', compact('policy', 'policiesTranslation'));
    }
    
    public function policyAdd()
    {
        return view('Admin.policy.add-policy');
    }
    public function policyAddProcc(Request $request)
    {
  
        // Validation for title and description
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $siteLanguage = SiteLanguages::where('handle', $request->handle)->first();
        if ($siteLanguage && $siteLanguage->primary !== 1) {
  
            // Handle the translation logic
            if ($request->policy_tr_id) {
                // If a translation ID is provided, find the existing translation
                $policyTranslation = PolicyTranslation::find($request->policy_tr_id);
                // If the translation is not found, return with an error
                if (!$policyTranslation) {
                    return redirect()->back()->with('error', 'Policy translation not found');
                }
    
                // Update the translation with new data
                $policyTranslation->title = $request->title;
                $policyTranslation->slug  = Str::slug($request->title);
                $policyTranslation->description = $request->description;
                $policyTranslation->save();
                return redirect()->back()->with('success', 'Policy Translations  updated successfully');
            } 
            else {
                // If no translation ID is provided, create a new translation
                $policyTranslation = new PolicyTranslation();
                $policyTranslation->title = $request->title;
                $policyTranslation->slug  = Str::slug($request->title);
                $policyTranslation->description = $request->description;
                $policyTranslation->policy_id = $request->id;
                $policyTranslation->language_id = $siteLanguage->id;
                $policyTranslation->save();
                return redirect()->back()->with('success', 'Policy Translations add successfully');
            }
        }else{
        //  Check if the request has an id and is not null
        if ($request->has('id') && $request->id) {
            // Attempt to find the existing policy
            $policy = Policy::find($request->id);
    
            if (!$policy) {
                // If the policy is not found, redirect back with an error message
                return redirect()->back()->with('error', 'Policy not found');
            }
    
            // Update the policy with the new data
            $policy->title = $request->title;
            $policy->slug  = Str::slug($request->title);
            $policy->description = $request->description;
            $policy->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Policy updated successfully');
        }
    
        // If no id, create a new policy
        $policy = new Policy();
        $policy->title = $request->title;
        $policy->slug  = Str::slug($request->title);
        $policy->description = $request->description;
        $policy->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Policy added successfully');
        }
     
    }

    // remove policy function

    public function pulicyRemove($id)
    {
        $policy = Policy::find($id);
        if(!$policy)
        {
            return redirect()->back()->with('error','policy not found');
        }
        $policy->delete();
        return redirect()->back()->with('success','policy remove successfully');
    }

    // end remove policy function

    public function rules()
    {
        $rules = Rule::with('policy')->get();

        $locale = getCurrentLocale();

        $siteLanguage = SiteLanguages::where('handle',$locale)->first();

        $rules = Rule::with(['translations' => function ($query) use ($siteLanguage){
                                            $query->where('language_id',$siteLanguage->id);
                                        }])->get();
                              
        return view('Admin.policy.rules.index',compact('rules'));
    }

    
    public function ruleEdit($id)
    {
        $rule = Rule::with('policy')->find($id);
        if(!$rule){
            return redirect()->back()->with('error','not found rule');
        }
        $locale = getCurrentLocale();

        $siteLanguage = SiteLanguages::where('handle', $locale)->first();
    
        // Check if site language exists
        if ($siteLanguage) {
            // If the language is not primary, fetch the translation for the policy
            if ($siteLanguage->primary !== 1) {
                $ruleTranslation = RuleTranslation::with('language')->where('rule_id', $id)
                                                         ->where('language_id', $siteLanguage->id)
                                                         ->first();
            } else {
                // If it's the primary language or no translation found, use the main policy
                $ruleTranslation = null;
            }
        } 
        else {
            // Handle the case when no matching site language is found
            $ruleTranslation = null;
        }

        $policies = Policy::all(); 



        return view('Admin.policy.rules.add-rule', compact('rule', 'policies','ruleTranslation'));
    }

    public function ruleAdd()
    {
        $policies = Policy::all();

        return view('Admin.policy.rules.add-rule',compact('policies'));
    }

    public function ruleAddProcc(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $siteLanguage = SiteLanguages::where('handle',$request->handle)->first();
        if($siteLanguage && $siteLanguage->primary !== 1)
        {
            if($request->rule_tr_id){

                $ruleTranslation = RuleTranslation::find($request->rule_tr_id);
                if(!$ruleTranslation)
                {
                    return redirect()->back()->with('error','Rule translation not found');
                }else
                {
                    $ruleTranslation->title = $request->title;
                    $ruleTranslation->description = $request->description;
                    $ruleTranslation->rule_id     = $request->rule_tr_id;
                    $ruleTranslation->language_id  = $siteLanguage->id;
                    $ruleTranslation->update();
                    return redirect()->back()->with('success','Rule translation update successfully');
                }

            }else{

                $ruleTranslation = new RuleTranslation;
                $ruleTranslation->title =  $request->title;
                $ruleTranslation->description = $request->description;
                $ruleTranslation->rule_id = $request->id;
                $ruleTranslation->language_id   =  $siteLanguage->id;
                $ruleTranslation->save();
                return redirect()->back()->with('success','Rule translation add successfully');
            }

        }
        if ($request->has('id') && $request->id) {
            // Attempt to find the existing policy
            $rule = Rule::find($request->id);
    
            if (!$rule) {
                // If the policy is not found, redirect back with an error message
                return redirect()->back()->with('error', 'Policy not found');
            }
    
            // Update the policy with the new data
            $rule->title = $request->title;
            $rule->slug  = Str::slug($request->title);
            $rule->policy_id  = $request->policy_id;
            $rule->description = $request->description;
            $rule->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Rule updated successfully');
        }
    
        // If no id, create a new policy
        $rule = new Rule();
        $rule->title = $request->title;
        $rule->slug  = Str::slug($request->title);
        $rule->policy_id  = $request->policy_id;
        $rule->description = $request->description;
        $rule->save();
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Rule added successfully');
    }
    public function ruleRemove($id)
    {
        $rule = Rule::find($id);
        if(!$rule)
        {
            return redirect()->back()->with('error','rule not found');
        }
        $rule->delete();
        return redirect()->back()->with('success','rule remove successfully');
    }
}
