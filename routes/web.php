<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\{AdminDashController};


use App\Http\Controllers\User\{ViewController};

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['web']], function () {

//         Route::get('/',[ViewController::class,'home']);

//         // Route::get('/', function () {
//         //     return 'Current locale: ' . LaravelLocalization::getCurrentLocale();
//         // });
        

//         Route::get('/login',[AuthenticationController::class,'index']);
//         Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);
//         Route::get('/logout',[AuthenticationController::class,'logout']);


//         //admin
//         Route ::group(['middleware' =>['admin']],function(){
//             Route::get('/admin-dashboard',[AdminDashController::class,'index']);


//             // profile settings 
//             Route::get('admin-dashboard/setting', [AdminDashController::class, 'profile']);
//             Route::post('admin-dashboard/update-profile-procc', [AdminDashController::class, 'ProfileUpdateProcc']);
//             Route::post('admin-dashboard/change-password-procc', [AdminDashController::class, 'updatePasswordProcc']);
            

//         });

// });


// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function() {
//         Route::get('/',[ViewController::class,'home']);
//         /** Add other localized routes here **/
//     });
    
Route::group(['prefix' => '{locale?}', 'middleware' => ['AddLocaleAutomatically']], function () {

    Route::get('/', [ViewController::class, 'home'])->name('/');

});