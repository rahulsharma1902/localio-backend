<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SiteLanguages,CategoryTranslation};
class ViewController extends Controller
{
    //
    public function home(){

        return view('User.home.index');
    }
 
}
