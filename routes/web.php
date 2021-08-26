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

Route::get('update-district', 'LoadAddressController@updateDistrict')->name('update.district');
Route::get('update-ward', 'LoadAddressController@updateWard')->name('update.ward');

//========================== HOME ==============================
Route::get('/', 'Client\HomeController@index')->name('home');

//===================  CATEGORY & DETAIL =======================
Route::get('{slug}.html', 'Client\CategoryController@index')->name('client.category');

//=================== PRODUCT & DETAIL =======================
Route::get('san-pham/{slug}.html', 'Client\ProductController@index')->name('client.product');

//=================== BLOG & DETAIL =======================
Route::get('blog/{slug}.html', 'Client\BlogController@index')->name('client.blog');

//=================== NEWS & DETAIL =======================
Route::get('tin-tuc/{slug}.html', 'Client\NewsController@index')->name('client.news');

//=================== CONTACT =======================
Route::get('lien-he.html', 'Client\ContactController@index')->name('client.contact');

//========================= ACCOUNT ============================
Route::group(['prefix' => 'tai-khoan', 'middleware' => ['auth:web']], function () {
    Route::get('', 'Client\AccountController@index')->name('client.account');
    Route::post('cap-nhat', 'Client\AccountController@update')->name('client.update_profile');
});

//========================== CART ==============================
Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('', 'Client\CartController@index')->name('client.cart');
    Route::post('them', 'Client\CartController@add')->name('client.cart.add');
    Route::post('cap-nhat', 'Client\CartController@update')->name('client.cart.update');
    Route::post('xoa', 'Client\CartController@delete')->name('client.cart.delete');
});

//========================= Contact ===========================
Route::group(['prefix' => 'lien-he'], function () {
    Route::post('send-mail', 'Client\ContactController@sendMail')->name('client.sena_contact_mail');
});

//========================= CHECKOUT ===========================
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('thanh-toan', 'Client\CheckoutController@index')->name('client.checkout');
    Route::post('order', 'Client\CheckoutController@order')->name('client.checkout.order');
});

Auth::routes();

Route::get('auth/redirect/{provider_name}', 'Auth\SocialController@redirect')->name('redirect');
Route::get('auth/callback/{provider_name}', 'Auth\SocialController@callback');

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
            Route::get('thong-bao.html', 'Admin\UserProfileController@notifies')->name('admin.user.notifies');
            Route::get('hoat-dong-tai-khoan.html',
                'Admin\UserProfileController@accountActivity')->name('admin.user.account_activity');
            Route::get('cai-dat-bao-mat.html',
                'Admin\UserProfileController@securitySetting')->name('admin.user.security_settings');
        });

        //======================= CUSTOMER =============================
        Route::group(['prefix' => 'khach-hang'], function () {
            Route::get('danh-sach.html', 'Admin\CustomerController@index')->name('admin.customer.index');
            Route::get('chi-tiet/{id}.html', 'Admin\CustomerController@detail')->name('admin.customer.detail');
        });

        //======================= CATEGORY =============================
        Route::group(['prefix' => 'danh-muc'], function () {

            //-------------------- PRODUCT CATEGORY ------------------------
            Route::group(['prefix' => 'san-pham'], function () {
                Route::get('danh-sach.html', 'Admin\Category\CategoryController@index')->name('admin.category.index');
                Route::get('chinh-sua/{id}.html', 'Admin\Category\CategoryController@edit')->name('admin.category.edit');
                Route::post('store', 'Admin\Category\CategoryController@store')->name('admin.category.store');
                Route::post('update/{id}', 'Admin\Category\CategoryController@update')->name('admin.category.update');
                Route::get('xoa/{id}', 'Admin\Category\CategoryController@delete')->name('admin.category.delete');
            });

            //-------------------- NEWS CATEGORY ------------------------
            Route::group(['prefix' => 'tin-tuc'], function () {
                Route::get('danh-sach.html',
                    'Admin\Category\NewsCategoryController@index')->name('admin.category_news.index');
                Route::get('chinh-sua/{id}.html',
                    'Admin\Category\NewsCategoryController@edit')->name('admin.category_news.edit');
                Route::post('store', 'Admin\Category\NewsCategoryController@store')->name('admin.category_news.store');
                Route::post('update/{id}',
                    'Admin\Category\NewsCategoryController@update')->name('admin.category_news.update');
                Route::get('xoa/{id}', 'Admin\Category\NewsCategoryController@delete')->name('admin.category_news.delete');
            });

            //-------------------- BLOG CATEGORY ------------------------
            Route::group(['prefix' => 'blog'], function () {
                Route::get('danh-sach.html',
                    'Admin\Category\BlogCategoryController@index')->name('admin.category_blog.index');
                Route::get('chinh-sua/{id}.html',
                    'Admin\Category\BlogCategoryController@edit')->name('admin.category_blog.edit');
                Route::post('store', 'Admin\Category\BlogCategoryController@store')->name('admin.category_blog.store');
                Route::post('update/{id}',
                    'Admin\Category\BlogCategoryController@update')->name('admin.category_blog.update');
                Route::get('xoa/{id}', 'Admin\Category\BlogCategoryController@delete')->name('admin.category_blog.delete');
            });
        });

        //======================= PRODUCT =============================
        Route::group(['prefix' => 'san-pham'], function () {
            Route::get('danh-sach.html', 'Admin\ProductController@index')->name('admin.product.index');
            Route::get('them-moi.html', 'Admin\ProductController@create')->name('admin.product.create');
            Route::post('store', 'Admin\ProductController@store')->name('admin.product.store');
            Route::get('cap-nhat/{id}.html', 'Admin\ProductController@edit')->name('admin.product.edit');
            Route::post('update/{id}', 'Admin\ProductController@update')->name('admin.product.update');
            Route::get('xoa-san-pham/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
            Route::post('update-stock/{id}',
                'Admin\ProductController@updateStock')->name('admin.product.update_stock');
            Route::post('update-price/{id}',
                'Admin\ProductController@updatePrice')->name('admin.product.update_price');

            //---------------------- PRODUCT IMAGE ------------------------
            Route::get('them-anh-san-pham/{id}.html',
                'Admin\ProductImageController@create')->name('admin.product_image.create');
            Route::post('anh-san-pham/store/{id}',
                'Admin\ProductImageController@store')->name('admin.product_image.store');
            Route::get('xoa-anh-san-pham/{id}',
                'Admin\ProductImageController@delete')->name('admin.product_image.delete');
        });

        //======================= BLOG =============================
        Route::group(['prefix' => 'blog'], function () {
            Route::get('danh-sach.html', 'Admin\BlogController@index')->name('admin.blog.index');
            Route::get('them-moi.html', 'Admin\BlogController@create')->name('admin.blog.create');
            Route::post('store', 'Admin\BlogController@store')->name('admin.blog.store');
            Route::get('cap-nhat/{id}.html', 'Admin\BlogController@edit')->name('admin.blog.edit');
            Route::post('update/{id}', 'Admin\BlogController@update')->name('admin.blog.update');
            Route::get('xoa-blog/{id}', 'Admin\BlogController@delete')->name('admin.blog.delete');
        });

        //======================= NEWS =============================
        Route::group(['prefix' => 'tin-tuc'], function () {
            Route::get('danh-sach.html', 'Admin\NewsController@index')->name('admin.news.index');
            Route::get('them-moi.html', 'Admin\NewsController@create')->name('admin.news.create');
            Route::post('store', 'Admin\NewsController@store')->name('admin.news.store');
            Route::get('cap-nhat/{id}.html', 'Admin\NewsController@edit')->name('admin.news.edit');
            Route::post('update/{id}', 'Admin\NewsController@update')->name('admin.news.update');
            Route::get('xoa-tin-tuc/{id}', 'Admin\NewsController@delete')->name('admin.news.delete');
        });

        //===================== DISCOUNT ===========================
        Route::group(['prefix' => 'khuyen-mai'], function () {
            Route::get('danh-sach.html', 'Admin\DiscountController@index')->name('admin.discount.index');
            Route::get('them-moi.html', 'Admin\DiscountController@create')->name('admin.discount.create');
            Route::post('store', 'Admin\DiscountController@store')->name('admin.discount.store');
            Route::get('cap-nhat/{id}.html', 'Admin\DiscountController@edit')->name('admin.discount.edit');
            Route::post('update/{id}', 'Admin\DiscountController@update')->name('admin.discount.update');
            Route::get('xoa-khuyen-mai/{id}', 'Admin\DiscountController@delete')->name('admin.discount.delete');
        });

        //====================== ORDER ============================
        Route::group(['prefix' => 'hoa-don'], function () {
            Route::get('danh-sach.html', 'Admin\OrderController@index')->name('admin.order.index');
            Route::get('cap-nhat/{id}.html', 'Admin\OrderController@edit')->name('admin.order.edit');
            Route::post('update/{id}', 'Admin\OrderController@update')->name('admin.order.update');
            Route::post('change-status', 'Admin\OrderController@changeStatus')->name('admin.order.change_status');
            Route::get('xoa-hoa-don/{id}', 'Admin\OrderController@delete')->name('admin.order.delete');
            Route::get('chi-tiet/{id}', 'Admin\OrderController@detail')->name('admin.order.detail');
        });
    });
});
