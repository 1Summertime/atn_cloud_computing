<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerAuth;
use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\ControllerCategory;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerImage;
use App\Http\Controllers\ControllerSlide;
use App\Http\Controllers\ControllerAccount;
use App\Http\Controllers\ControllerCart;
use App\Http\Controllers\ControllerOrder;
use App\Http\Middleware\CheckLogin;
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
//     return view('welcome');
// });

// Route::get('/layout', function() {
//     return view('user.layout');
// });
// Route::get('/home', function() {
//     return view('user.admin.home');
// })->name('home');
// Route::get('/management-user', function() {
//     return view('user.admin.management_user');
// });
// Route::get('/management-category', function() {
//     return view('user.admin.management_category');
// });
// Route::get('/management-product', function() {
//     return view('user.admin.management_product');
// });
// Route::get('/create-product', function() {
//     return view('product.create');
// });


// Login and register
Route::get('/Register', [ControllerUser::class, 'create'])->name('create.register');
Route::post('/Register', [ControllerUser::class, 'store'])->name('register.store');
Route::get('Login', [ControllerAuth::class, 'showLogin'])->name('showLogin');
Route::post('Login', [ControllerAuth::class, 'login'])->name('auth.login');
Route::get('/auth/google', [ControllerAuth::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [ControllerAuth::class, 'handleGoogleCallback']);
Route::get('/Logout', [ControllerAuth::class, 'logout'])->name('logout');

// Admin
Route::group(['prefix'=>'Admin'], function() {
    Route::get('management_user', [ControllerAdmin::class, 'management_user'])->name('management_user')->middleware(CheckLogin::class);
    Route::get('management_category', [ControllerAdmin::class, 'management_category'])->name('management_category')->middleware(CheckLogin::class);
    Route::get('management_product', [ControllerAdmin::class, 'management_product'])->name('management_product')->middleware(CheckLogin::class);
    Route::get('management_slide', [ControllerAdmin::class, 'management_slide'])->name('management_slide')->middleware(CheckLogin::class);
    Route::get('management_order', [ControllerAdmin::class, 'management_order'])->name('management_order')->middleware(CheckLogin::class);
});

Route::get('profile', [ControllerUser::class, 'profile'])->name('admin.profile');
Route::get('edit_profile/{id}', [ControllerUser::class, 'editprofile'])->name('edit.profile');
Route::post('update/{id}', [ControllerUser::class, 'update'])->name('update.profile');
Route::get('create_user', [ControllerUser::class, 'create_user'])->name('create_user');
Route::post('update_account_buyer/{id}', [ControllerUser::class, 'update_account_buyer'])->name('update.profile_buyer');
Route::post('delivery_order/{id}', [ControllerOrder::class, 'delivery_order'])->name('delivery.order');
Route::get('edit_account/{id}', [ControllerUser::class, 'edit_account'])->name('edit.account');
Route::post('edit_account/{id}', [ControllerUser::class, 'update_account'])->name('update.account');



//Category
Route::group(['prefix'=>'Category'], function() {
    Route::get('/create', [ControllerCategory::class, 'create'])->name('create.category');
    Route::post('/store', [ControllerCategory::class, 'store'])->name('store.category');
    Route::get('/{id}', [ControllerCategory::class, 'edit'])->name('edit.category');
    Route::post('/update/{id}', [ControllerCategory::class, 'update'])->name('update.category');
});

//Product
Route::group(['prefix' =>'Product'], function() {
    Route::get('create', [ControllerProduct::class, 'create'])->name('create.product');
    Route::post('store', [ControllerProduct::class, 'store'])->name('store.product');
   
    Route::post('update/{id}', [ControllerProduct::class, 'update'])->name('update.product');
});
Route::get('edit/{id}', [ControllerProduct::class, 'edit'])->name('edit.product');
Route::get('detail/{id}', [ControllerProduct::class, 'show'])->name('product.detail');
Route::post('/update_image/{id}', [ControllerImage::class, 'update'])->name('update.image');
Route::get('search_category/{id}', [ControllerProduct::class, 'search_category'])->name('search.category');


//Home
Route::get('home', [ControllerHome::class, 'index'])->name('index.nam');
// Route::get('Slide', [ControllerHome::class, 'slide'])->name('slide.home');

Route::get('search', [ControllerHome::class, 'search_product'])->name('product.search');

Route::get('slide_create', [ControllerSlide::class, 'create'])->name('slide.create');
Route::post('slide_create', [ControllerSlide::class, 'store'])->name('store.slide');
Route::get('Slide', [ControllerSlide::class, 'index'])->name('slide.index');
Route::post('feedback', [ControllerProduct::class, 'feedback'])->name('product.feedback');



Route::get('profile_buyer', [ControllerAccount::class, 'profile_buyer'])->name('profile');
Route::get('cart', [ControllerCart::class, 'index'])->name('index.cart');
Route::post('cart', [ControllerCart::class, 'store'])->name('product.cart');
Route::post('order', [ControllerOrder::class, 'store'])->name('product.order');
Route::get('order', [ControllerOrder::class, 'index'])->name('index.order');


Route::get('', [ControllerHome::class, 'guest'])->name('guest');