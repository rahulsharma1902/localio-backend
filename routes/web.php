<?php

use App\Http\Controllers\Admin\SiteContent\SiteContentController;
use App\Http\Controllers\Admin\{AdminDashController,CategoriesController,SiteLanguagesController,FilterController,ArticleController,SitePagesController,AdminProductController,HomeContentController,ReviewController};

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\CountryController;

use App\Http\Controllers\User\MetaPages\MetaPagesController;

use App\Http\Controllers\User\{ViewController,CategoryController,ProductController,UserController,TermAndConditionController};
use App\Http\Controllers\Vendor\HomeController;
use Illuminate\Support\Facades\Route;






Route::get('auth/google', [AuthenticationController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [AuthenticationController::class, 'handleGoogleCallback']);
Route::get('/category/{id}',[ViewController::class,'categoryShow'])->name('category-show');


Route::get('login/facebook', [AuthenticationController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [AuthenticationController::class, 'handleFacebookCallback']);


// Switch Language Route
Route::group(['prefix' => '{langCode?}', 'where' => ['langCode' => '[a-zA-Z-]+']], function () {
    Route::get('/', [ViewController::class, 'home'])->name('home.lang'); // Home with language code
    Route::get('/switch-language', [ViewController::class, 'changeLanguage'])->name('change-lang');
});

// Default Home Route (without language prefix)
Route::get('/', [ViewController::class, 'home'])->name('home'); // This is the default route


//Route::post('loginprocc',[AuthenticationController::class,'loginProcc'])->name('login_process');

// Route::get('/', [ViewController::class, 'home'])->name('home');
//Route::get('/login',[AuthenticationController::class,'index'])->name('login');
//Route::post('/loginprocc',[AuthenticationController::class,'loginProcc'])->name('login_process');
//Route::get('/register',[AuthenticationController::class,'register'])->name('register');
//Route::post('/register-process',[AuthenticationController::class,'registerProcc'])->name('register-process');
//Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');



Route::group(['prefix'=> '{locale?}', 'middleware' => ['AddLocaleAutomatically']], function () {
    
    Route::get('/admin-dashboard',[AdminDashController::class,'index'])->name('admin_dashboard');
    Route::get('/', [ViewController::class, 'home'])->name('home');
    Route::get('/login',[AuthenticationController::class,'index'])->name('login');
    Route::get('/register',[AuthenticationController::class,'register'])->name('register');
    Route::post('/register-process',[AuthenticationController::class,'registerProcc'])->name('register-process');
    Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');
    // Vendor Register Route
    Route::get('/vendor-register',[AuthenticationController::class,'vendorRegisterForm'])->name('vendor-register');
    Route::post('/vendor-register-process',[AuthenticationController::class,'vendorRegisterProcess'])->name('vendor-register-process');
    // End Vendor Register Route

    Route::get('/recover-password',[AuthenticationController::class,'forgotPassword'])->name('recover-password');
    Route::post('/password-procc',[AuthenticationController::class,'forgotProcc'])->name('password-procc');
    Route::get('/otp-confirm',[AuthenticationController::class,'otpConfirm'])->name('get-otp');
    Route::post('opt-procc',[AuthenticationController::class,'optProcc'])->name('opt-procc');
    Route::get('new-password',[AuthenticationController::class,'newPassword'])->name('new-passwod');
    Route::post('new-password-procc',[AuthenticationController::class,'newPasswordProcc'])->name('new-password-procc');
    // Category Controller
    Route::get('/category',[CategoryController::class,'index'])->name('category');

    // Product Controller
    Route::get('/product',[ProductController::class,'productDetail'])->name('product');
    Route::get('/top-rated-product',[ProductController::class,'topRatedProduct'])->name('top-rated-product');
    Route::get('/product-comparison',[ProductController::class,'productComparison'])->name('product-comparison');

       //TermAndConditionController
    Route::get('/privacy-policy',[TermAndConditionController::class,'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms-condition',[TermAndConditionController::class,'termsCondtion'])->name('terms-condition');

    // SiteMetaPages Controller
    Route::get('/expert-guide',[MetaPagesController::class,'expertGuide'])->name('expert-guide');
    Route::get('/help-center',[MetaPagesController::class,'helpCenter'])->name('help-center');
    Route::get('/who-we-are',[MetaPagesController::class,'whoWeAre'])->name('who-we-are');
    Route::get('/contact',[MetaPagesController::class,'contact'])->name('contact');

    Route::get('/blog',[MetaPagesController::class,'blog'])->name('blog');

    Route::get('/vendor-get-listed',[HomeController::class,'vendorGetListed'])->name('vendor-get-listed');

    Route::post('fetch-product', [ProductController::class, 'fetchProduct'])->name('fetch.product');

    Route::post('wishlist',[ProductController::class,'addToWishlist'])->name('withlist');
});

// Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);

Route::group(['middleware' =>['admin']],function(){
    // Route::get('/admin-dashboard',[AdminDashController::class,'index']);
    // Route::get('/{locale}/admin-dashboard',[AdminDashController::class,'index'])->where('locale', '^(en|de|es)$');
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

    // Countrycontroller

    Route::get('/admin-dashboard/country', [CountryController::class,'index'])->name('country.index');
    Route::get('/admin-dashboard/country/update/{id}', [CountryController::class, 'update'])->name('country.update');
    Route::post('/admin-dashboard/country/updateProcc', [CountryController::class, 'updateProcc'])->name('country.updateProcc');
    Route::get('/admin-dashboard/country/add', [CountryController::class, 'add'])->name('country.add');
    Route::post('/admin-dashboard/country/addProcc', [CountryController::class,'addProcc'])->name('country.addProcc');
    Route::get('/admin-dashboard/country/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');




    // FilterController :
    Route::get('/admin-dashboard/filters', [FilterController::class, 'index'])->name('filters');
    Route::get('/admin-dashboard/filter/add', [FilterController::class, 'add'])->name('filter-add');
    Route::post('/admin-dashboard/filter/addProcc', [FilterController::class, 'addProcc'])->name('filter-addProcc');
    Route::get('/admin-dashboard/update-filter/{filterId}', [FilterController::class, 'updateFilter'])->name('update-filter');
    Route::post('/admin-dashboard/update-filter/updateProcc', [FilterController::class, 'updateProcc'])->name('update-filter-updateProcc');
    Route::get('/admin-dashboard/remove-filter/{id}', [FilterController::class, 'remove']);


    // ArticleController
    Route::get('/admin-dashboard/article',[ArticleController::class,'index'])->name('article');
    Route::get('/admin-dashboard/article/add',[ArticleController::class,'add'])->name('article-add');
    Route::post('/admin-dashboard/article/addProcc',[ArticleController::class,'addProcc'])->name('article-addProcc');
    Route::get('/admin-dashboard/article-edit/{id}',[ArticleController::class,'articleEdit'])->name('article-edit');
    Route::post('/admin-dashboard/article/update',[ArticleController::class,'articleUpdateProcc'])->name('article-update');
    Route::get('/admin-dashboard/article-remove/{id?}',[ArticleController::class,'articleRemove'])->name('article-remove');

    // Article Category Route

    Route::get('/admin-dashboard/article-category',[ArticleController::class,'articleCategory'])->name('article-category');

    Route::get('/admin-dashboard/article/category/add',[ArticleController::class,'articleCategoryAdd'])->name('article-category-add');

    Route::post('/admin-dashboard/article/category/addProcc',[ArticleController::class,'articleCategoryAddProcc'])->name('article-category-addProcc');
    Route::get('/admin-dashboard/edit-article-category/{id}',[ArticleController::class,'articleCategoryEdit'])->name('article-category-edit');
    Route::post('/admin-dashboard/article/category/update',[ArticleController::class,'articleCategoryUpdate'])->name('article-category-update');

    Route::get('/admin-dashboard/remove-article-category/{id?}',[ArticleController::class,'articleCategoryRemove'])->name('article-category-remove');

    // policies Route
    Route::get('/admin-dashboard/policies',[SitePagesController::class,'policies'])->name('policies');
    Route::get('/admin-dashboard/policy/add',[SitePagesController::class,'policyAdd'])->name('policy-add');
    Route::get('/admin-dashboard/policy-edit/{id}',[SitePagesController::class,'policyEdit'])->name('policy-edit');
    Route::post('/admin-dashboard/policy-add',[SitePagesController::class,'policyAddProcc'])->name('policy-add-process');

    // Remove policy

    Route::get('/admin-dashboard/policy-remove/{id?}',[SitePagesController::class,'pulicyRemove'])->name('policy-remove');

    // Rules Route

    Route::get('/admin-dashboard/rules',[SitePagesController::class,'rules'])->name('rules');
    Route::get('/admin-dashboard/rule/add',[SitePagesController::class,'ruleAdd'])->name('rule-add');
    Route::post('/admin-dashboard/rule-add-procc',[SitePagesController::class,'ruleAddProcc'])->name('rule-add-procc');
    Route::get('/admin-dashboard/rule-edit/{id}',[SitePagesController::class,'ruleEdit'])->name('rule-edit');
    Route::get('/admin-dashboard/rule-remove/{id}',[SitePagesController::class,'ruleRemove'])->name('rule-remove');

     // FAQ's Route
     Route::get('/admin-dashboard/faqs',[SitePagesController::class,'faqs'])->name('faqs');
     Route::get('/admin-dashboard/faq-add',[SitePagesController::class,'faqAdd'])->name('faq-add');
     Route::post('/admin-dashboard/faq-add-procc',[SitePagesController::class,'faqAddProcc'])->name('faq-add-procc');
     Route::get('/admin-dashboard/faq-edit/{id}',[SitePagesController::class,'faqEdit'])->name('faq-edit');
     Route::get('/admin-dashboard/faq-remove/{id}',[SitePagesController::class,'faqRemove'])->name('remove-faq');

    //  Products Route
    Route::get('/admin-dashboard/products',[AdminProductController::class,'products'])->name('products');
    Route::get('/admin-dashboard/product/add',[AdminProductController::class,'productAdd'])->name('product-add');
    Route::post('/admin-dashboard/product-add-procc',[AdminProductController::class,'productAddProccess'])->name('product-add-procc');
    Route::get('/admin-dashboard/product-edit/{id}',[AdminProductController::class,'productEdit'])->name('product-edit');
    Route::get('/admin-dashboard/remove-product/{id}',[AdminProductController::class,'removeProduct'])->name('product-remove');

    // SiteContent Route

    // Home Page Route
    Route::get('/admin-dashboard/home-page',[SiteContentController::class,'homeContent'])->name('home-content');
    Route::post('/admin-dashboard/home-page-update',[SiteContentController::class,'homeContentUpdate'])->name('home-content-update');
    Route::post('/admin-dashboard/update-lang-file',[SiteContentController::class,'updateLangFile'])->name('update-lang-file');

    // Header Page Route
    Route::get('/admin-dashboard/header-page',[SiteContentController::class,'headerPage'])->name('header-page');
    Route::post('/admin-dashboard/header-page-update',[SiteContentController::Class,'headerContentUpdate'])->name('header-content-update');

    // Footer Page Route
    Route::get('/admin-dashboard/footer-page',[SiteContentController::class,'footerPage'])->name('footer-page');
    Route::post('/admin-dashboard/footer-page-update',[SiteContentController::class,'footerPageUpdate'])->name('footer-page-update');

    // Categories Page Content Route

    Route::get('/admin-dashboard/categories-page',[SiteContentController::class,'categoriesPage'])->name('categories-page');
    Route::post('/admin-dashboard/category-page-update',[SiteContentController::class,'categoryPageContentUpdate'])->name('category-page-content-update');

    // Top Product Page Content Route

    Route::get('/admin-dashboard/top-product-page',[SiteContentController::class,'topProductPageContent'])->name('top-product-page-content');
    Route::post('/admin-dashboard/product-page-update',[SiteContentController::Class,'topProductPageUpdate'])->name('product-page-update');

    // Reviews Section Route

    Route::get('/admin-dashboard/reviews',[ReviewController::class,'reviews'])->name('reviews');
    Route::get('/admin-dashboard/review/add',[ReviewController::class,'reviewAdd'])->name('review-add');
    Route::post('/admin-dashboard/review-add-procc',[ReviewController::class,'reviewAddProc'])->name('review-add-procc');

    Route::get('/admin-dashboard/review-status-update/{id}',[ReviewController::class,'reviewStatusUpdate'])->name('review-status-update');

    Route::get('/admin-dashboard/review-status-edit/{id}', [ReviewController::class, 'reviewEdit'])->name('review-edit');
Route::post('/admin-dashboard/review-status-update/{id}', [ReviewController::class, 'reviewUpdate'])->name('review-update');
Route::get('/admin-dashboard/review-status-update/{id}', [ReviewController::class, 'reviewStatusUpdate'])->name('review-status-update');
Route::get('/admin-dashboard/review-delete/{id}', [ReviewController::class, 'reviewDelete'])->name('review-delete');


});

Route::group(['middleware' =>['vendor']],function(){
    Route::get('/{locale}/vendor-dashboard',[HomeController::class,'index'])->name('vendor-dashboard')->where('locale', 'en');
});
// Route::group(['prefix' => '{locale?}', 'middleware' => ['AddLocaleAutomatically']], function () {
//     Route::group(['middleware' => ['vendor']], function () {
//         Route::get('/vendor-dashboard', [HomeController::class, 'index'])->name('vendor-dashboard');
//     });
// });


Route::get('/set-site-active-language/{lang_code}', [SiteLanguagesController::class, 'setActiveSiteLanguage'])->name('set-site-languages');