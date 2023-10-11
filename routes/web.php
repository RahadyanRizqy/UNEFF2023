<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('general.layout', ['child' => 'home']);
});

Route::get('/home', function() {
    return view('general.layout', ['child' => 'home']);
});

// Route::get('/wel', function() {
//     return view('welcome');
// });

Route::get('admin-login', [AccountController::class, 'index'])->name('admin.login');
Route::post('admin-login', [AccountController::class, 'login'])->name('admin.check');
Route::get('logout', [AccountController::class, 'logout'])->name('admin.logout');

// DASHBOARD
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/dashboard/main', [DashboardController::class, 'index'])->name('dashboard.main');
Route::get('dashboard/{child}', [DashboardController::class, 'child'])->name('dashboard.child');
Route::resource('dashboard/posts', PostController::class);

Route::put('dashboard/posts/{post}/show', [PostController::class, 'showPost'])->name('dashboard.post.show');
Route::put('dashboard/posts/{post}/hide', [PostController::class, 'hidePost'])->name('dashboard.post.hide');
// Route::get('/programs', [DashboardController::class, 'getJson']);
// Route::put('/programs/update', [DashboardController::class, 'updateJson'])->name('updateJson');
// Route::get('/programs2', [DashboardController::class, 'tampung']);

Route::get('rules', [DashboardController::class, 'getRules']);
Route::put('rules/update', [DashboardController::class, 'updateRules']);

Route::get('profile', [DashboardController::class, 'getProfile']);
Route::put('profile/update', [DashboardController::class, 'updateProfile']);

Route::get('news', [GeneralController::class, 'news'])->name('general.news');
Route::get('juries', [GeneralController::class, 'jury'])->name('general.jury');
Route::get('event', [GeneralController::class, 'profile_detail'])->name('general.event');
Route::get('submit_work', [GeneralController::class, 'submit_work'])->name('general.submit_work');
// Route::get('news/{post}', [GeneralController::class, 'news_specific'])->name('news.specific');

Route::get('news/{year}', [GeneralController::class, 'news_route']);
Route::get('news/{year}/{month}', [GeneralController::class, 'news_route']);
Route::get('news/{year}/{month}/{slug}', [GeneralController::class, 'news_route'])->name('news.route');