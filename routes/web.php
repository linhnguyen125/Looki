<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//================================================================
//======================= ADMIN AUTH =============================
//================================================================

Route::group(['prefix' => 'admin'], function () {
    //======================= AUTH ADMIN =============================
    Route::get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthAdmin\LoginController@login');
    Route::post('logout','AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::post('password/email','AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset.html','AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset','AuthAdmin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token}','AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    //----------------------- last login -----------------------------
    Route::get('lastlogin', 'AuthAdmin\LoginController@lastLogin');

    //======================= ADMIN =============================
    Route::get('', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('user.html', 'Admin\UserController@index')->name('admin.user.index');
    Route::get('user/chi-tiet_{id}.html', 'Admin\UserController@detail')->name('admin.user.detail');
    Route::get('user/them-moi.html', 'Admin\UserController@create')->name('admin.user.create');
    Route::post('user/store', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('user/suspend/{id}', 'Admin\UserController@suspend')->name('admin.user.suspend');
    Route::get('user/active/{id}', 'Admin\UserController@active')->name('admin.user.active');
    //----------------------- ADMIN PROFILE ------------------------------
    Route::get('user/thong-tin-ca-nhan_{id}.html', 'Admin\UserProfileController@info')->name('admin.user.info');
    Route::post('user/update-avatar/{id}', 'Admin\UserProfileController@updateAvatar')->name('admin.user.update_avatar');
    Route::post('user/update-profile/{id}', 'Admin\UserProfileController@updateProfile')->name('admin.user.update_profile');
    Route::get('user/update-district', 'LoadAddressController@updateDistrict')->name('update.district');
    Route::get('user/update-ward', 'LoadAddressController@updateWard')->name('update.ward');
    Route::get('user/thong-bao.html', 'Admin\UserProfileController@notifies')->name('admin.user.notifies');
    Route::get('user/hoat-dong-tai-khoan.html', 'Admin\UserProfileController@accountActivity')->name('admin.user.account_activity');
    Route::get('user/cai-dat-bao-mat.html', 'Admin\UserProfileController@securitySetting')->name('admin.user.security_settings');

    //======================= CUSTOMER =============================
    Route::get('customer.html', 'Customer\CustomerController@index')->name('admin.customer.index');
    Route::get('customer/chi-tiet_{id}.html', 'Customer\CustomerController@detail')->name('admin.customer.detail');

    //======================= CATEGORY =============================
    Route::get('category.html', 'Category\CategoryController@index')->name('admin.category.index');
    Route::get('category/them-moi.html', 'Category\CategoryController@create')->name('admin.category.create');

});
