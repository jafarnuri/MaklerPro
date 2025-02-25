<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
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
        Route::get('/makler-qazanci', 'maklerQazanci')->name('admin.makler_qazanci');
        Route::get('/setting-edit', 'setting_edit')->name('admin.setting_edit');
        Route::put('/setting-update/{id}','Setting')->name('admin.setting_update');



    });

        // Admin Controller üçün route-lar
        Route::controller(AuthController::class)->group(function () {

            Route::get('/delete-user/{id}', 'delete')->name('admin.delete_user');
            Route::get('/profile/{id}', 'profile')->name('admin.profile');
            Route::put('/profile-update/{id}', 'profile_update')->name('admin.profile_update');
        });
   //Home Controller üçün route-lar
    Route::controller(HomeController::class)->group(function () {
        Route::post('/home-store', 'home_store')->name('admin.home_store');
        Route::get('/home-show', 'home_show')->name('admin.home_show');
        Route::get('/home-edit/{id}', 'home_edit')->name('admin.home_edit');
        Route::get('/home-makler_faiz-edit/{id}', 'home_makler_faiz')->name('admin.home_makler_faiz');
        Route::get('/home-create', 'home_create')->name('admin.home_create');
        Route::get('/home-self', 'my_home')->name('admin.my_home');
        Route::get('/home-sold', 'sold_home')->name('admin.sold_home');
        Route::get('/home-rented', 'rented_home')->name('admin.rented_home');
        Route::get('/home-delete/{id}', 'delete')->name('admin.home_delete');
        Route::put('/home-update/{id}','home_update')->name('admin.home_update');
        Route::put('/home-makler_faiz/{id}','makler_faiz')->name('admin.home.makler_faiz');
   

      
    });

       //Home Controller üçün route-lar
       Route::controller(ShopController::class)->group(function () {
        Route::post('/shop-store', 'shop_store')->name('admin.shop_store');
        Route::get('/shop-show', 'shop_show')->name('admin.shop_show');
        Route::get('/shop-edit/{id}', 'shop_edit')->name('admin.shop_edit');
        Route::get('/shop-makler_faiz-edit/{id}', 'shop_makler_faiz')->name('admin.shop_makler_faiz');
        Route::get('/shop-create', 'shop_create')->name('admin.shop_create');
        Route::get('/shop-self', 'my_shop')->name('admin.my_shop');
        Route::get('/shop-sold', 'sold_shop')->name('admin.sold_shop');
        Route::get('/shop-rented', 'rented_shop')->name('admin.rented_shop');
        Route::get('/shop-delete/{id}', 'delete')->name('admin.shop_delete');
        Route::put('/shop-update/{id}','shop_update')->name('admin.shop_update');
        Route::put('/shop-makler_faiz/{id}','makler_faiz')->name('admin.shop.makler_faiz');

      
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




