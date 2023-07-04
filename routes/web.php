<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

// Route::get('/wel', function() {
//     return view('welcome');
// });

Route::get('/admin-login', [AccountController::class, 'index'])->name('admin.login');
Route::post('/admin-login', [AccountController::class, 'login'])->name('admin.check');
Route::get('/logout', [AccountController::class, 'logout'])->name('admin.logout');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/dashboard/main', [DashboardController::class, 'index'])->name('dashboard.main');
Route::get('/dashboard/{child}', [DashboardController::class, 'child'])->name('dashboard.child');
Route::resource('dashboard/posts', PostController::class);