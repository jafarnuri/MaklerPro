<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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





Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Admin Controller üçün route-lar
    Route::controller(AdminController::class)->group(function () {
 
        Route::get('/user-show', 'user_show')->name('admin.user_show');
        Route::get('/dashboard', 'index')->name('admin.home');
    });
   //Home Controller üçün route-lar
    Route::controller(HomeController::class)->group(function () {
        Route::post('/home-store', 'home_store')->name('admin.home_store');
        Route::get('/home-show', 'home_show')->name('admin.home_show');
        Route::get('/home-create', 'home_create')->name('admin.home_create');
        Route::get('/home-sold', 'sold_home')->name('admin.sold_home');
        Route::get('/home-rented', 'rented_home')->name('admin.rented_home');
        Route::post('/admin/home/update-status',  'updateStatus')->name('admin.home.updateStatus');

    });
    // Auth Controller üçün route-lar
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');

        Route::middleware(['admin'])->group(function () {
            Route::get('/register', 'register')->name('admin.register');
            Route::post('/postregister', 'postregister')->name('admin.postregister');
        });
    });

});




