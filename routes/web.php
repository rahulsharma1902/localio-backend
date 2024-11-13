<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\{AdminDashController,CategoriesController,SiteLanguagesController,FilterController};


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


    
Route::group(['prefix' => '{locale?}', 'middleware' => ['AddLocaleAutomatically']], function () {

    Route::get('/', [ViewController::class, 'home'])->name('/');

    Route::get('/login',[AuthenticationController::class,'index']);
    
    Route::get('/logout',[AuthenticationController::class,'logout']);




});

Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);  

Route::group(['middleware' =>['admin']],function(){
    Route::get('/{locale}/admin-dashboard',[AdminDashController::class,'index'])->where('locale', 'en');
    // Route::get('admin-dashboard',[AdminDashController::class,'index']);


    // profile settings 
    Route::get('admin-dashboard/setting', [AdminDashController::class, 'profile']);
    Route::post('admin-dashboard/update-profile-procc', [AdminDashController::class, 'ProfileUpdateProcc']);
    Route::post('admin-dashboard/change-password-procc', [AdminDashController::class, 'updatePasswordProcc']);
    
    


    //  CategoriesController  categories
    Route::get('/admin-dashboard/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::post('/admin-dashboard/categories/add', [CategoriesController::class, 'add'])->name('add-category');
    Route::get('/admin-dashboard/remove-category/{id}', [CategoriesController::class, 'remove']);
    Route::get('/admin-dashboard/categories-get', [CategoriesController::class, 'getCategories']);
    Route::get('/admin-dashboard/update-category/{categoryId}', [CategoriesController::class, 'updateCategory'])->name('update-category');
    Route::post('/admin-dashboard/update-category/updateProcc', [CategoriesController::class, 'updateProcc'])->name('update-category-updateProcc');


    // SiteLanguagesController

    Route::get('/admin-dashboard/site-languages', [SiteLanguagesController::class, 'index'])->name('site-languages');
    Route::get('/admin-dashboard/site-languages/add', [SiteLanguagesController::class, 'add'])->name('site-languages-add');
    Route::post('/admin-dashboard/site-languages/addProcc', [SiteLanguagesController::class, 'addProcc'])->name('site-languages-addProcc');
    Route::get('/admin-dashboard/site-language/update/{id}', [SiteLanguagesController::class, 'update'])->name('site-language-update');
    Route::post('/admin-dashboard/site-language/updateProcc', [SiteLanguagesController::class, 'updateProcc'])->name('site-language-updateProcc');

    Route::get('/admin-dashboard/remove-site-language/{id}', [SiteLanguagesController::class, 'remove'])->name('site-language-remove');


    // FilterController
    Route::get('/admin-dashboard/filters', [FilterController::class, 'index'])->name('filters');
    Route::get('/admin-dashboard/filter/add', [FilterController::class, 'add'])->name('filter-add');
    Route::post('/admin-dashboard/filter/addProcc', [FilterController::class, 'addProcc'])->name('filter-addProcc');
    Route::get('/admin-dashboard/update-filter/{filterId}', [FilterController::class, 'updateFilter'])->name('update-filter');
    Route::post('/admin-dashboard/update-filter/updateProcc', [FilterController::class, 'updateProcc'])->name('update-filter-updateProcc');
    Route::get('/admin-dashboard/remove-filter/{id}', [FilterController::class, 'remove']);


});



Route::get('/set-site-active-language/{handle}', [SiteLanguagesController::class, 'setActiveSiteLanguage'])->name('set-site-languages');


