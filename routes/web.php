<?php

use App\Http\Controllers\Admin\SiteContent\SiteContentController;
use App\Http\Controllers\Admin\{AdminDashController, CategoriesController, SiteLanguagesController, FilterController, ArticleController, SitePagesController, AdminProductController, AdminSettingsController, DBrefreshController, HomeContentController, ProductFetureController, ReviewController};

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\CountryController;

use App\Http\Controllers\User\MetaPages\MetaPagesController;

use App\Http\Controllers\User\{ViewController, CategoryController, ProductController, UserController, TermAndConditionController};
use App\Http\Controllers\Vendor\HomeController;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\Route;


Route::get('auth/google', [AuthenticationController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [AuthenticationController::class, 'handleGoogleCallback']);
Route::get('/category/{id}', [ViewController::class, 'categoryShow'])->name('category-show');

Route::get('login/facebook', [AuthenticationController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [AuthenticationController::class, 'handleFacebookCallback']);

// Switch Language Route
Route::get('/switch-language/{lang_code}', [ViewController::class, 'changeLanguage'])->name('switch-language');


Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('loginprocc', [AuthenticationController::class, 'loginProcc'])->name('login_process');

// --------------- ADMIN ROUTES ----------------------
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin-dashboard', [AdminDashController::class, 'index'])->name('admin_dashboard');
    Route::get('admin-dashboard/setting', [AdminDashController::class, 'profile']);
    Route::post('admin-dashboard/update-profile-procc', [AdminDashController::class, 'ProfileUpdateProcc']);
    Route::post('admin-dashboard/change-password-procc', [AdminDashController::class, 'updatePasswordProcc']);
    Route::get('admin-dashboard/who-we-are', [AdminDashController::class, 'whoWeAreContent'])->name('who_we_are_content');
    Route::post('admin-dashboard/who-we-are', [AdminDashController::class, 'updateWhoWeAre'])->name('admin.who_we_are.update');
    Route::get('admin/page-tile-translation/{id}', [AdminDashController::class, 'deletePageTileTranslation'])->name('admin.page_tile_translation.delete');
    Route::post('/admin/page-tile-translation/update', [AdminDashController::class, 'MPSsectionUpdate'])->name('admin.page_tile_translation.update');
    Route::post('/admin/page-tile-specialist-translation/update', [AdminDashController::class, 'SpecialistUpdate'])->name('admin.page_tile_specialist_translation.update');

    Route::get('/admin/page-expert-guide/update', [AdminDashController::class, 'ExperGuide'])->name('admin.page-expert-guide.update');
    Route::post('/admin/expert-guide/update', [AdminDashController::class, 'ExperGuideUpdate'])->name('expertGuide.update');
    Route::post('/admin/page-education-translation/update', [AdminDashController::class, 'ESsectionUpdate'])->name('admin.page_education_translation.update');
    Route::post('/admin/page-right-tool-translation/update', [AdminDashController::class, 'RTsectionUpdate'])->name('admin.page_Right_tool_translation.update');
    Route::get('/admin/page-contact/update', [AdminDashController::class, 'Contact'])->name('admin.page-contact.update');
    Route::post('/admin/page-contact-content/update', [AdminDashController::class, 'ContactUpdate'])->name('admin.page-contact-content.update');
    Route::post('/admin/page-right-tool/update', [AdminDashController::class, 'RightToolItemUpdate'])->name('admin.page_Right_tool.update');


    //  CategoriesController  categories
    Route::get('/admin-dashboard/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/admin-dashboard/categories/add/{id?}', [CategoriesController::class, 'add'])->name('add-category');
    Route::post('/admin-dashboard/categories/add-process', [CategoriesController::class, 'add_process'])->name('add-category-process');
    Route::get('/admin-dashboard/remove-category/{id}', [CategoriesController::class, 'remove'])->name('admin-remove-categories');

    // SiteLanguagesController

    Route::get('/admin-dashboard/site-languages', [SiteLanguagesController::class, 'index'])->name('site-languages');
    Route::get('/admin-dashboard/site-languages/add', [SiteLanguagesController::class, 'add'])->name('site-languages-add');
    Route::post('/admin-dashboard/site-languages/addProcc', [SiteLanguagesController::class, 'addProcc'])->name('site-languages-addProcc');
    Route::get('/admin-dashboard/site-language/update/{id}', [SiteLanguagesController::class, 'update'])->name('site-language-update');
    Route::post('/admin-dashboard/site-language/updateProcc', [SiteLanguagesController::class, 'updateProcc'])->name('site-language-updateProcc');
    Route::get('/admin-dashboard/remove-site-language/{id}', [SiteLanguagesController::class, 'remove'])->name('site-language-remove');

    // Countrycontroller

    Route::get('/admin-dashboard/country', [CountryController::class, 'index'])->name('country.index');
    Route::get('/admin-dashboard/country/update/{id}', [CountryController::class, 'update'])->name('country.update');
    Route::post('/admin-dashboard/country/updateProcc', [CountryController::class, 'updateProcc'])->name('country.updateProcc');
    Route::get('/admin-dashboard/country/add', [CountryController::class, 'add'])->name('country.add');
    Route::post('/admin-dashboard/country/addProcc', [CountryController::class, 'addProcc'])->name('country.addProcc');
    Route::get('/admin-dashboard/country/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');



    // DB-Refresh
    Route::get('/admin-dashboard/db-refresh', [AdminSettingsController::class, 'index'])->name('dbrefresh.index');
    Route::post('/admin-dashboard/db-refresh', [AdminSettingsController::class, 'refersh_database'])->name('dbrefresh.refresh');

    // FilterController :
    Route::get('/admin-dashboard/filters', [FilterController::class, 'index'])->name('filters');
    Route::get('/admin-dashboard/filter/add', [FilterController::class, 'add'])->name('filter-add');
    Route::post('/admin-dashboard/filter/addProcc', [FilterController::class, 'addProcc'])->name('filter-addProcc');
    Route::get('/admin-dashboard/update-filter/{filterId}', [FilterController::class, 'updateFilter'])->name('update-filter');
    Route::post('/admin-dashboard/update-filter/updateProcc', [FilterController::class, 'updateProcc'])->name('update-filter-updateProcc');
    Route::get('/admin-dashboard/remove-filter/{id}', [FilterController::class, 'remove']);

    // ArticleController
    Route::get('/admin-dashboard/article', [ArticleController::class, 'index'])->name('article');
    Route::get('/admin-dashboard/article/add', [ArticleController::class, 'add'])->name('article-add');
    Route::post('/admin-dashboard/article/addProcc', [ArticleController::class, 'addProcc'])->name('article-addProcc');
    Route::get('/admin-dashboard/article-edit/{id}', [ArticleController::class, 'articleEdit'])->name('article-edit');
    Route::post('/admin-dashboard/article/update', [ArticleController::class, 'articleUpdateProcc'])->name('article-update');
    Route::get('/admin-dashboard/article-remove/{id?}', [ArticleController::class, 'articleRemove'])->name('article-remove');

    // Article Category Route

    Route::get('/admin-dashboard/article-category', [ArticleController::class, 'articleCategory'])->name('article-category');

    Route::get('/admin-dashboard/article/category/add', [ArticleController::class, 'articleCategoryAdd'])->name('article-category-add');

    Route::post('/admin-dashboard/article/category/addProcc', [ArticleController::class, 'articleCategoryAddProcc'])->name('article-category-addProcc');
    Route::get('/admin-dashboard/edit-article-category/{id}', [ArticleController::class, 'articleCategoryEdit'])->name('article-category-edit');
    Route::post('/admin-dashboard/article/category/update', [ArticleController::class, 'articleCategoryUpdate'])->name('article-category-update');

    Route::get('/admin-dashboard/remove-article-category/{id?}', [ArticleController::class, 'articleCategoryRemove'])->name('article-category-remove');

    // policies Route
    Route::get('/admin-dashboard/policies', [SitePagesController::class, 'policies'])->name('policies');
    Route::get('admin-dashboard/policy/add/{id?}',[SitePagesController::class, 'policiesAddShow'])->name('policies_add_show');
    Route::post('/admin-dashboard/policy/add-process', [SitePagesController::class, 'policiesadd'])->name('policy-add');
    Route::get('/admin-dashboard/policy-remove/{id?}', [SitePagesController::class, 'pulicyRemove'])->name('policy-remove');

    // terms Route
    Route::get('/admin-dashboard/terms', [SitePagesController::class, 'terms_show'])->name('terms');
    Route::get('admin-dashboard/terms/add/{id?}',[SitePagesController::class, 'termsAdd_show'])->name('terms_add_show');
    Route::post('/admin-dashboard/terms/add-process', [SitePagesController::class, 'terms_add_process'])->name('terms_add_process');
    Route::get('/admin-dashboard/terms-remove/{id?}', [SitePagesController::class, 'terms_remove'])->name('terms-remove');
    // Rules Route
    Route::get('/admin-dashboard/rules', [SitePagesController::class, 'rules'])->name('rules');
    Route::get('/admin-dashboard/rule/add', [SitePagesController::class, 'ruleAdd'])->name('rule-add');
    Route::post('/admin-dashboard/rule-add-procc', [SitePagesController::class, 'ruleAddProcc'])->name('rule-add-procc');
    Route::get('/admin-dashboard/rule-edit/{id}', [SitePagesController::class, 'ruleEdit'])->name('rule-edit');
    Route::get('/admin-dashboard/rule-remove/{id}', [SitePagesController::class, 'ruleRemove'])->name('rule-remove');

    // FAQ's Route
    Route::get('/admin-dashboard/faqs', [SitePagesController::class, 'faqs'])->name('faqs');
    Route::get('/admin-dashboard/faq-add', [SitePagesController::class, 'faqAdd'])->name('faq-add');
    Route::post('/admin-dashboard/faq-add-procc', [SitePagesController::class, 'faqAddProcc'])->name('faq-add-procc');
    Route::get('/admin-dashboard/faq-edit/{id}', [SitePagesController::class, 'faqEdit'])->name('faq-edit');
    Route::get('/admin-dashboard/faq-remove/{id}', [SitePagesController::class, 'faqRemove'])->name('remove-faq');

    //  Products Route
    Route::get('/admin-dashboard/products', [AdminProductController::class, 'products'])->name('products');
    Route::get('/admin-dashboard/product/add', [AdminProductController::class, 'productAdd'])->name('product-add');
    Route::post('/admin-dashboard/product-add-procc', [AdminProductController::class, 'productAddProccess'])->name('product-add-procc');
    Route::get('/admin-dashboard/product-edit/{id}', [AdminProductController::class, 'productEdit'])->name('product-edit');
    Route::post('/admin-dashboard/product-update-procc', [AdminProductController::class, 'productUpdateProccess'])->name('product-update-procc');
    Route::get('/admin-dashboard/remove-product/{id}', [AdminProductController::class, 'removeProduct'])->name('product-remove');


    // product feture Route
    Route::get('/admin-dashboard/product-feature', [ProductFetureController::class, 'index'])->name('productfeature.index');
    Route::get('/admin-dashboard/product-feture-add', [ProductFetureController::class, 'add'])->name('productfeature.add');
    Route::post('/admin-dashboard/product-feture-add-process', [ProductFetureController::class, 'add_process'])->name('productfeature.add-process');
    Route::get('/admin-dashboard/product-feture-update-process/{id}', [ProductFetureController::class, 'update'])->name('productfeature.update');
    Route::post('/admin-dashboard/product-feture-update-process', [ProductFetureController::class, 'update_process'])->name('productfeature.update-process');
    Route::get('/admin-dashboard/product-feture-remove-process/{id}', [ProductFetureController::class, 'remove'])->name('productfeature.remove-process');



    // SiteContent Route

    // Home Page Route
    Route::get('/admin-dashboard/home-page', [SiteContentController::class, 'homeContent'])->name('home-content');
    Route::post('/admin-dashboard/home-page-update', [SiteContentController::class, 'homeContentUpdate'])->name('home-content-update');
    Route::post('/admin-dashboard/update-lang-file', [SiteContentController::class, 'updateLangFile'])->name('update-lang-file');


    // Header Page Route
    Route::get('/admin-dashboard/header-page', [SiteContentController::class, 'headerPage'])->name('header-page');
    Route::post('/admin-dashboard/header-page-update', [SiteContentController::class, 'headerContentUpdate'])->name('header-content-update');

    // Footer Page Route
    Route::get('/admin-dashboard/footer-page', [SiteContentController::class, 'footerPage'])->name('footer-page');
    Route::post('/admin-dashboard/footer-page-update', [SiteContentController::class, 'footerPageUpdate'])->name('footer-page-update');

    // Top Product Page Content Route

    Route::get('/admin-dashboard/top-product-page', [SiteContentController::class, 'topProductPageContent'])->name('top-product-page-content');
    Route::post('/admin-dashboard/product-page-update', [SiteContentController::class, 'topProductPageUpdate'])->name('product-page-update');

    // Reviews Section Route
    Route::get('/admin-dashboard/reviews', [ReviewController::class, 'reviews'])->name('reviews');
    Route::get('/admin-dashboard/review/add', [ReviewController::class, 'reviewAdd'])->name('review-add');
    Route::post('/admin-dashboard/review-add-procc', [ReviewController::class, 'reviewAddProc'])->name('review-add-procc');
    Route::get('/admin-dashboard/review-status-update/{id}', [ReviewController::class, 'reviewStatusUpdate'])->name('review-status-update');
    Route::get('/admin-dashboard/review-status-edit/{id}', [ReviewController::class, 'reviewEdit'])->name('review-edit');
    Route::post('/admin-dashboard/review-status-update/{id}', [ReviewController::class, 'reviewUpdate'])->name('review-update');
    Route::get('/admin-dashboard/review-status-update/{id}', [ReviewController::class, 'reviewStatusUpdate'])->name('review-status-update');
    Route::get('/admin-dashboard/review-delete/{id}', [ReviewController::class, 'reviewDelete'])->name('review-delete');
});

// --------------- USER ROUTES ----------------------
Route::group(['prefix' => '{locale?}', 'middleware' => ['guest', 'AddLocaleAutomatically']], function () {
    Route::get('/', [ViewController::class, 'home'])->name('home');
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('/register-process', [AuthenticationController::class, 'registerProcc'])->name('register-process');

    // Vendor Register Route
    Route::get('/vendor-register', [AuthenticationController::class, 'vendorRegisterForm'])->name('vendor-register');
    Route::post('/vendor-register-process', [AuthenticationController::class, 'vendorRegisterProcess'])->name('vendor-register-process');
    // End Vendor Register Route

    Route::get('/recover-password', [AuthenticationController::class, 'forgotPassword'])->name('recover-password');
    Route::post('/password-procc', [AuthenticationController::class, 'forgotProcc'])->name('password-procc');
    Route::get('/otp-confirm', [AuthenticationController::class, 'otpConfirm'])->name('get-otp');
    Route::post('opt-procc', [AuthenticationController::class, 'optProcc'])->name('opt-procc');
    Route::get('new-password', [AuthenticationController::class, 'newPassword'])->name('new-passwod');
    Route::post('new-password-procc', [AuthenticationController::class, 'newPasswordProcc'])->name('new-password-procc');

    // Category Controller
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');

    // Product Controller
    Route::get('/product', [ProductController::class, 'productDetail'])->name('product');
    Route::get('/top-rated-product/{category?}', [ProductController::class, 'topRatedProduct'])->name('top-rated-product');
    Route::get('/product-comparison', [ProductController::class, 'productComparison'])->name('product-comparison');

    //TermAndConditionController
    Route::get('/privacy-policy', [TermAndConditionController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms-condition', [TermAndConditionController::class, 'termsCondtion'])->name('terms-condition');

    // SiteMetaPages Controller
    Route::get('/expert-guides', [MetaPagesController::class, 'expertGuide'])->name('expert-guide');
    Route::get('/help-center', [MetaPagesController::class, 'helpCenter'])->name('help-center');
    Route::get('/who-we-are', [MetaPagesController::class, 'whoWeAre'])->name('who-we-are');
    Route::get('/contact', [MetaPagesController::class, 'contact'])->name('contact');
    Route::get('/privacy-policy', [MetaPagesController::class, 'showPrivacyPolicy'])->name('privacy-policy');

    Route::get('/blog', [MetaPagesController::class, 'blog'])->name('blog');

    Route::get('/vendor-get-listed', [HomeController::class, 'vendorGetListed'])->name('vendor-get-listed');

    Route::post('fetch-product', [ProductController::class, 'fetchProduct'])->name('fetch.product');

    Route::post('wishlist', [ProductController::class, 'addToWishlist'])->name('withlist');
});



Route::group(['middleware' => ['vendor']], function () {
    Route::get('/{locale}/vendor-dashboard', [HomeController::class, 'index'])
        ->name('vendor-dashboard')
        ->where('locale', 'en');
});



Route::get('/set-site-active-language/{lang_code}', [SiteLanguagesController::class, 'setActiveSiteLanguage'])->name('set-site-languages');
