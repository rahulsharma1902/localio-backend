<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;
use App\Models\Language;
use App\Models\PolicyTranslation;
use App\Models\Rule;
use Illuminate\Support\Str;
use App\Models\RuleTranslation;
use App\Models\Faq;
use App\Models\FaqTranslation;

class SitePagesController extends Controller
{
    public function policies()
    {
        $privacy_policy = PolicyTranslation::get()->pluck('title','id');
        return view('Admin.site-content.privacy-policy.privacy-policy',compact('privacy_policy'));
    }

    public function policiesAddShow($id = null){
        if($id == null){
            return view('Admin.site-content.privacy-policy.privacy-policy-add');
        }else{
            $policy_data = PolicyTranslation::where('id',$id)->first()->toArray();
            return view('Admin.site-content.privacy-policy.privacy-policy-add',compact('policy_data'));
        }
    }

    public function policiesadd(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'policy_description' => 'required|string',
        ]);

        $policy = Policy::updateOrCreate(
            ['id' => $request->policy_id],
            [
                'lang_id' => 1
            ]
        );

        $policyId = $policy->id;

        $polcytranslation = PolicyTranslation::updateOrCreate(
            ['policy_id' => $request->policy_id],
            [
                'title' => $validatedData['title'],
                'lang_id' => 1,
                'description' => $validatedData['policy_description'],
                'key' =>$policyId,
                'policy_id' => $policyId,
                'status' => 'active'
            ]
        );

        $polcytranslation->update(['key' => $polcytranslation->id]);
        return redirect()->route('policies')->with('success', 'Successfully created policy');
    }

    public function pulicyRemove($id)
    {
        $policy = Policy::find($id);
        if(!$policy)
        {
            return redirect()->back()->with('error','policy not found');
        }
        $policy->delete();
        PolicyTranslation::where('id',$id)->delete();
        return redirect()->back()->with('success','policy remove successfully');
    }

    // end remove policy function

    public function rules()
    {
        $rules = Rule::with('policy')->get();

        $locale = getCurrentLocale();

        $siteLanguage = Language::where('lang_code',$locale)->first();

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

        $siteLanguage = Language::where('lang_code', $locale)->first();

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

        $lang_code = Language::where('lang_code',$request->handle)->first();
        if($lang_code)

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
                    $ruleTranslation->language_id  = $lang_code->id;
                    $ruleTranslation->update();
                    return redirect()->back()->with('success','Rule translation update successfully');
                }

            }else{

                $ruleTranslation = new RuleTranslation;
                $ruleTranslation->title =  $request->title;
                $ruleTranslation->description = $request->description;
                $ruleTranslation->rule_id = $request->id;
                $ruleTranslation->language_id   =  $lang_code->id;
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

            return redirect()->back()->with('success', 'Rule updated successfully');
        }

        // If no id, create a new policy
        $rule = new Rule();
        $rule->title = $request->title;
        $rule->slug  = Str::slug($request->title);
        $rule->policy_id  = $request->policy_id;
        $rule->description = $request->description;
        $rule->save();

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
    public function faqs()
    {
        // $faqs = Faq::all();
        $locale = getCurrentLocale();

        $lang_code = Language::where('lang_code',$locale)->first();
        $faqs = Faq::with(['translations' =>function($query) use ($lang_code){
                            $query->where('language_id',$lang_code->id);

                    }])->get();
        return view('Admin.faqs.index',compact('faqs'));
    }

    public function faqAdd()
    {
        return view('Admin.faqs.faq_add');
    }

    public function faqEdit($id)
    {
        $locale = getCurrentLocale();

        $faq = Faq::find($id);
        if(!$faq)
        {
            return redirect()->back()->with('error','faq not found');
        }


        $lang_code = Language::where('lang_code',$locale)->first();


        if($lang_code && $lang_code->primary !== 1)
        {
            $faqTranslation = FaqTranslation::with('language')->where('faq_id',$id)->where('language_id', $lang_code->id)->first();
        }else{
            $faqTranslation = null;
        }
        return view('Admin.faqs.faq_add',compact('faq','faqTranslation'));
    }

    public function faqAddProcc(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer'    => 'required',
        ]);

        $lang_code = Language::where('lang_ocde',$request->handle)->first();


        if($lang_code)
        {
            $faqTranslation = isset($request->faq_tr_id) ? FaqTranslation::find($request->faq_tr_id) : new FaqTranslation;
            $faqTranslation->faq_id = $request->id;

            $faqTranslation->language_id = $lang_code->id;
            $faqTranslation->question       = $request->question;

            $faqTranslation->answer  = $request->answer;
            $faqTranslation->save();  // Save the translation
            return redirect()->back()->with('success', isset($request->faq_tr_id) ? 'FAQ translation successfully updated' : 'FAQ translation successfully added');
        }
        else{
            $faq = isset($request->id) ? Faq::find($request->id) : new Faq;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();
            return redirect()->back()->with('success', isset($request->id) ? 'FAQ successfully updated' : 'FAQ successfully added');
        }
    }
    public function faqRemove($id)
    {
        $faq = Faq::find($id);
        if(!$faq)
        {
            return redirect()->back()->with('error','faq not found');
        }
        $faq->delete();
        return redirect()->back()->with('success','faq remove successfully');
    }
}
