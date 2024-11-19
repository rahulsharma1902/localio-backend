<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermAndConditionController extends Controller
{
    //
    public function privacyPolicy()
    {
        return view('User.terms_condition.privacy_policy');
    }
    public function termsCondtion()
    {
        return view('User.terms_condition.terms_condition');
    }
}
