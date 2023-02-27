<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PdfController;
use App\Http\Controllers\Dashboard\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::controller(App\Http\Controllers\Frontend\FrontController::class)->group(function(){
    Route::get('/','index');
    Route::get('/thank-you','thankYou');
    Route::get('/categories','categories');
    Route::get('/categories/{slug}','products');
    Route::get('/categories/{slug}/{product_slug}','productView');
    Route::get('/new-arrivals','newArrival');
    Route::get('/featured','featured');
    Route::get('/search','search');
});


Route::middleware('auth')->group(function(){
    Route::controller(App\Http\Controllers\Frontend\WishlistController::class)->group(function(){
        Route::get('wishlist','wishlist');
        Route::get('cart','cart');
        Route::get('checkout','checkout');
    });
    Route::controller(App\Http\Controllers\Frontend\CheckoutController::class)->group(function(){
        Route::get('checkout','index');;
    });
    Route::controller(App\Http\Controllers\Frontend\OrderController::class)->group(function(){
        Route::get('orders','index');
        Route::get('order/{id}','view');
    });
    Route::controller(App\Http\Controllers\Frontend\FrontController::class)->group(function(){
        Route::get('/profile','profile');
        Route::post('/profile','updateProfile');
        Route::get('/change-password','changePassword');
        Route::post('/change-password','updatePassword');
    });
});


Route::group(['prefix'=>'dashboard','as'=>'dashboard.','middleware'=>['auth','isAdmin']],function(){
    Route::get('/admin', [App\Http\Controllers\Dashboard\DashboardController::class,'index']);
    route::get('/remove-image/{id}',[ProductController::class,'removeImage']);

    route::resource('categories',CategoryController::class);
    route::resource('products',ProductController::class);
    route::resource('colors',ColorController::class);
    route::resource('users',UserController::class);
    route::post('update-color-qty',[ColorController::class,'updateColorQty']);
    route::post('delete-color',[ColorController::class,'deleteColor']);
    
    route::resource('sliders',SliderController::class);
    route::resource('orders',OrderController::class);

    route::get('order/invoice/{id}',[PdfController::class,'create']);
    route::get('order/invoice/{id}/generate',[PdfController::class,'view']);
    route::get('order/invoice/{id}/mail',[PdfController::class,'sendEmail']);
    route::get('brands',App\Http\Livewire\Admin\Brand\Index::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
