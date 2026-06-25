<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CmsContactPageController;
use App\Http\Controllers\Admin\CmsHomePageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IntroducerController;
use App\Http\Controllers\Admin\OurProcessController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProtectionPageController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return redirect()->route('admin.login');
});

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact-us', [HomeController::class, 'contactPage'])->name('contact');
Route::post('/contact-us-store', [HomeController::class, 'contactFormStore'])->name('contact.store');
Route::get('/introducer', [HomeController::class, 'introducerPage'])->name('introducer');
Route::get('/become-an-introducer', [HomeController::class, 'becomeAnIntroducer'])->name('become-an-introducer');
Route::post('/become-an-introducer-store', [HomeController::class, 'becomeAnIntroducerStore'])->name('become-an-introducer-store');
Route::get('/protection', [HomeController::class, 'protectionPage'])->name('protection');
Route::get('/services', [HomeController::class, 'allServices'])->name('all-services');
Route::get('/service/{slug}', [HomeController::class, 'serviceSinglePage'])->name('service');
Route::get('/service-details/{slug}', [HomeController::class, 'serviceDetails'])->name('service-details');
Route::get('/privacy-policy', [HomeController::class, 'privacyPage'])->name('privacy-policy');
Route::get('/terms-and-conditions', [HomeController::class, 'termsPage'])->name('terms-of-business');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/our-process', [Homecontroller::class, 'process'])->name('process');


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/optimize', function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:cache');
        return 'Command executed successfully!';
        // return what you want
    });


    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/change-password/{id}', [ProfileController::class, 'chnagePassword'])->name('chnage.password');
        // CMS Pages
        Route::resource('/homepage', CmsHomePageController::class)->names('homepage');
        Route::resource('/contactus', CmsContactPageController::class)->names('contactus');
        Route::resource('/website-setting', WebsiteSettingController::class)->names('website-setting');
        Route::resource('/privacy-policy', PrivacyPolicyController::class)->names('privacy-policy');
        Route::resource('/aboutus', AboutUsController::class)->names('aboutus');
        Route::resource('/ourprocess', OurProcessController::class)->names('ourprocess');
        Route::resource('/terms-and-condition', TermsAndConditionController::class)->names('terms-and-condition');
        Route::resource('/service-categories', ServiceCategoryController::class)->names('service-categories');
        Route::resource('/services', ServiceController::class)->names('services');
        Route::post('/service-status-update/{id}', [ServiceController::class, 'updateServiceStatus'])->name('service-status-update');
        Route::resource('/partners', PartnerController::class)->names('partners');
        Route::post('/partner-status-update/{id}', [PartnerController::class, 'updatePartnerStatus'])->name('partner-status-update');
        Route::resource('/become-introducer', IntroducerController::class)->names('become-introducer');
        Route::resource('/protection-page', ProtectionPageController::class)->names('protection-page');
        Route::any('/store-int-type', [IntroducerController::class, 'storeIntTypes'])->name('store-int-type');
        Route::get('/introducer-details-page', [IntroducerController::class, 'introducerDetails'])->name('introducer-details-page');
        Route::post('/introducer-details-store', [IntroducerController::class, 'introducerDetailsStore'])->name('introducer-details-store');
        Route::get('/introducers', [IntroducerController::class, 'introducersList'])->name('introducers-list');
        Route::get('/contact-forms', [DashboardController::class, 'contactFormList'])->name('contact-form-list');
    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
