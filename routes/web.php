<?php

use App\Http\Controllers\Admin\ApplicationAdminController;
use App\Http\Controllers\Admin\ContactMessageAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ResultAdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Перемикання мови
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, \App\Http\Middleware\SetLocale::LOCALES, true)) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('lang.switch');

// Публічні сторінки
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/jury', [PageController::class, 'jury'])->name('jury');
Route::get('/jury/head', [PageController::class, 'juryHead'])->name('jury.head');
Route::get('/participants', [PageController::class, 'participants'])->name('participants');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/results', [PageController::class, 'results'])->name('results');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{news}', [PageController::class, 'newsShow'])->name('news.show');
Route::get('/partners', [PageController::class, 'partners'])->name('partners');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'store'])->middleware('throttle:forms')->name('contacts.store');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');

// Аутентифікація
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('throttle:forms');
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:login');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('throttle:forms')->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('throttle:forms')->name('password.update');
});
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Заявки (лише зареєстровані)
Route::middleware('auth')->group(function () {
    Route::get('/apply', [ApplicationController::class, 'create'])->name('apply');
    Route::post('/apply', [ApplicationController::class, 'store'])->middleware('throttle:forms')->name('apply.store');
    Route::get('/my-applications', [ApplicationController::class, 'my'])->name('applications.my');
});

// Адмінка
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/applications', [ApplicationAdminController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [ApplicationAdminController::class, 'show'])->name('applications.show');
    Route::get('/applications/{application}/age-document', [ApplicationAdminController::class, 'downloadAgeDocument'])->name('applications.age-document');
    Route::put('/applications/{application}', [ApplicationAdminController::class, 'update'])->name('applications.update');
    Route::post('/applications/send-results', [ApplicationAdminController::class, 'sendResults'])->name('applications.send-results');
    Route::post('/applications/{application}/send-result', [ApplicationAdminController::class, 'sendResult'])->name('applications.send-result');
    Route::delete('/applications/{application}', [ApplicationAdminController::class, 'destroy'])->name('applications.destroy');

    Route::resource('news', NewsAdminController::class)->except(['show']);
    Route::delete('/news/{news}/media/{media}', [NewsAdminController::class, 'destroyMedia'])->name('news.media.destroy');
    Route::resource('results', ResultAdminController::class)->except(['show']);

    Route::get('/gallery', [GalleryAdminController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryAdminController::class, 'store'])->name('gallery.store');
    Route::post('/gallery/videos', [GalleryAdminController::class, 'storeVideos'])->name('gallery.videos.store');
    Route::delete('/gallery/{gallery}', [GalleryAdminController::class, 'destroy'])->name('gallery.destroy');

    Route::resource('contact-messages', ContactMessageAdminController::class)->only(['index', 'show', 'destroy']);

    Route::get('/password', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});
