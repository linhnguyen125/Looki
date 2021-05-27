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

//================================================================
//========================== CLIENT ==============================
//================================================================


//========================== HOME ==============================
Route::get('/', 'Client\HomeController@index')->name('home');

//===================  CATEGORY & DETAIL =======================
Route::get('{slug}.html', 'Client\CategoryController@index')->name('client.category');





Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
//================================================================
//========================== ADMIN ===============================
//================================================================

Route::group(['prefix' => 'admin'], function () {
    //======================= AUTH ADMIN =============================
    Route::get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthAdmin\LoginController@login');
    Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::post('password/email',
        'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset.html',
        'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token}',
        'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    //----------------------- last login -----------------------------
    Route::get('lastlogin', 'AuthAdmin\LoginController@lastLogin');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

        //======================= ADMIN =============================
        Route::group(['prefix' => 'quan-tri-vien'], function () {
            Route::get('danh-sach.html', 'Admin\UserController@index')->name('admin.user.index');
            Route::get('chi-tiet/{id}.html', 'Admin\UserController@detail')->name('admin.user.detail');
            Route::get('them-moi.html', 'Admin\UserController@create')->name('admin.user.create');
            Route::post('store', 'Admin\UserController@store')->name('admin.user.store');
            Route::get('chan/{id}', 'Admin\UserController@suspend')->name('admin.user.suspend');
            Route::get('active/{id}', 'Admin\UserController@active')->name('admin.user.active');
            //----------------------- ADMIN PROFILE ------------------------------
            Route::get('thong-tin-ca-nhan/{id}.html', 'Admin\UserProfileController@info')->name('admin.user.info');
            Route::post('update-avatar/{id}',
                'Admin\UserProfileController@updateAvatar')->name('admin.user.update_avatar');
            Route::post('update-profile/{id}',
                'Admin\UserProfileController@updateProfile')->name('admin.user.update_profile');
            Route::get('update-district', 'LoadAddressController@updateDistrict')->name('update.district');
            Route::get('update-ward', 'LoadAddressController@updateWard')->name('update.ward');
            Route::get('thong-bao.html', 'Admin\UserProfileController@notifies')->name('admin.user.notifies');
            Route::get('hoat-dong-tai-khoan.html',
                'Admin\UserProfileController@accountActivity')->name('admin.user.account_activity');
            Route::get('cai-dat-bao-mat.html',
                'Admin\UserProfileController@securitySetting')->name('admin.user.security_settings');
        });

        //======================= CUSTOMER =============================
        Route::group(['prefix' => 'khach-hang'], function () {
            Route::get('danh-sach.html', 'Customer\CustomerController@index')->name('admin.customer.index');
            Route::get('chi-tiet/{id}.html', 'Customer\CustomerController@detail')->name('admin.customer.detail');
        });

        //======================= CATEGORY =============================
        Route::group(['prefix' => 'danh-muc'], function () {

            //-------------------- PRODUCT CATEGORY ------------------------
            Route::group(['prefix' => 'san-pham'], function () {
                Route::get('danh-sach.html', 'Category\CategoryController@index')->name('admin.category.index');
                Route::get('chinh-sua/{id}.html', 'Category\CategoryController@edit')->name('admin.category.edit');
                Route::post('store', 'Category\CategoryController@store')->name('admin.category.store');
                Route::post('update/{id}', 'Category\CategoryController@update')->name('admin.category.update');
                Route::get('xoa/{id}', 'Category\CategoryController@delete')->name('admin.category.delete');
            });

            //-------------------- NEWS CATEGORY ------------------------
            Route::group(['prefix' => 'tin-tuc'], function () {
                Route::get('danh-sach.html',
                    'Category\NewsCategoryController@index')->name('admin.category_news.index');
                Route::get('chinh-sua/{id}.html',
                    'Category\NewsCategoryController@edit')->name('admin.category_news.edit');
                Route::post('store', 'Category\NewsCategoryController@store')->name('admin.category_news.store');
                Route::post('update/{id}',
                    'Category\NewsCategoryController@update')->name('admin.category_news.update');
                Route::get('xoa/{id}', 'Category\NewsCategoryController@delete')->name('admin.category_news.delete');
            });

            //-------------------- BLOG CATEGORY ------------------------
            Route::group(['prefix' => 'blog'], function () {
                Route::get('danh-sach.html',
                    'Category\BlogCategoryController@index')->name('admin.category_blog.index');
                Route::get('chinh-sua/{id}.html',
                    'Category\BlogCategoryController@edit')->name('admin.category_blog.edit');
                Route::post('store', 'Category\BlogCategoryController@store')->name('admin.category_blog.store');
                Route::post('update/{id}',
                    'Category\BlogCategoryController@update')->name('admin.category_blog.update');
                Route::get('xoa/{id}', 'Category\BlogCategoryController@delete')->name('admin.category_blog.delete');
            });
        });

        //======================= PRODUCT =============================
        Route::group(['prefix' => 'san-pham'], function () {
            Route::get('danh-sach.html', 'Product\ProductController@index')->name('admin.product.index');
            Route::get('them-moi.html', 'Product\ProductController@create')->name('admin.product.create');
            Route::post('store', 'Product\ProductController@store')->name('admin.product.store');
            Route::get('cap-nhat/{id}.html', 'Product\ProductController@edit')->name('admin.product.edit');
            Route::post('update/{id}', 'Product\ProductController@update')->name('admin.product.update');
            Route::get('xoa-san-pham/{id}', 'Product\ProductController@delete')->name('admin.product.delete');
            Route::post('update-stock/{id}',
                'Product\ProductController@updateStock')->name('admin.product.update_stock');
            Route::post('update-price/{id}',
                'Product\ProductController@updatePrice')->name('admin.product.update_price');

            //---------------------- PRODUCT IMAGE ------------------------
            Route::get('them-anh-san-pham/{id}.html',
                'ProductImage\ProductImageController@create')->name('admin.product_image.create');
            Route::post('anh-san-pham/store/{id}',
                'ProductImage\ProductImageController@store')->name('admin.product_image.store');
            Route::get('xoa-anh-san-pham/{id}',
                'ProductImage\ProductImageController@delete')->name('admin.product_image.delete');
        });

        //======================= BLOG =============================
        Route::group(['prefix' => 'blog'], function () {
            Route::get('danh-sach.html', 'Blog\BlogController@index')->name('admin.blog.index');
            Route::get('them-moi.html', 'Blog\BlogController@create')->name('admin.blog.create');
            Route::post('store', 'Blog\BlogController@store')->name('admin.blog.store');
            Route::get('cap-nhat/{id}.html', 'Blog\BlogController@edit')->name('admin.blog.edit');
            Route::post('update/{id}', 'Blog\BlogController@update')->name('admin.blog.update');
            Route::get('xoa-blog/{id}', 'Blog\BlogController@delete')->name('admin.blog.delete');
        });

        //======================= NEWS =============================
        Route::group(['prefix' => 'tin-tuc'], function () {
            Route::get('danh-sach.html', 'News\NewsController@index')->name('admin.news.index');
            Route::get('them-moi.html', 'News\NewsController@create')->name('admin.news.create');
            Route::post('store', 'News\NewsController@store')->name('admin.news.store');
            Route::get('cap-nhat/{id}.html', 'News\NewsController@edit')->name('admin.news.edit');
            Route::post('update/{id}', 'News\NewsController@update')->name('admin.news.update');
            Route::get('xoa-tin-tuc/{id}', 'News\NewsController@delete')->name('admin.news.delete');
        });
    });
});
