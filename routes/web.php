<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CmsHomePageController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // CMS Pages
        Route::resource('/homepage', CmsHomePageController::class)->names('homepage');
        Route::resource('/website-setting', WebsiteSettingController::class)->names('website-setting');
        Route::resource('/privacy-policy', PrivacyPolicyController::class)->names('privacy-policy');
        Route::resource('/terms-and-condition', TermsAndConditionController::class)->names('terms-and-condition');
        Route::resource('/service-categories', ServiceCategoryController::class)->names('service-categories');
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
