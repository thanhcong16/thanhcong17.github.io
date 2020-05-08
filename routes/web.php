<?php

use App\Http\Middleware\CheckLogin;
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

// xây dựng route project

// front-end
    Route::get('', 'frontend\IndexController@GetIndex');
    Route::get('contact', 'frontend\IndexController@GetContact');

    ////đăng nhập
    Route::get('login', 'frontend\LoginController@GetLogin')->middleware('CheckLogout');
    Route::post('login', 'frontend\LoginController@PostLogin');
    ////đăng nhập

    ////Thành viên
    Route::group(['prefix' => 'member', 'middleware'=>'CheckLoginMember' ], function () {
        Route::get('/{id_user}', 'frontend\MemberController@GetMember' );
        Route::post('/{id_user}', 'frontend\MemberController@PostEditMember' );

        Route::get('editpassword/{id_user}', 'frontend\MemberController@GetPassword' );
        Route::post('editpassword/{id_user}', 'frontend\MemberController@PostEditPassword' );

        Route::get('logout/{id_user}', 'frontend\IndexController@GetLogout' );

    });
    ////Thành viên

    ///Account
    Route::group(['prefix' => 'account'], function () {
        Route::get('', 'frontend\AccountController@GetAccount' );
        Route::post('', 'frontend\AccountController@PostAccount' );


    });
    ///Account

    ////Sản phẩm
    Route::group(['prefix' => 'product'], function () {
        Route::get('detail', 'frontend\ProductController@GetDetail');
        Route::get('', 'frontend\ProductController@GetShop');
    });
    ////Sản phẩm

    ////Thanh toán
    Route::group(['prefix' => 'checkout',], function () {
        Route::get('', 'frontend\CheckOutController@GetCheckout');
        Route::get('complete', 'frontend\CheckOutController@GetComplete')->middleware('CheckLoginMember');

    });
    ////Thanh toán

    ////Giỏ hàng
    Route::group(['prefix' => 'cart'], function () {
        Route::get('', 'frontend\CartController@GetCart');
    });
    ////Giỏ hàng



    Route::group(['prefix' => 'errors'],function(){
        Route::get('', 'ErrorsController@GetErrors');
    });

//front-end

//back-end


    Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {
        Route::get('', 'backend\IndexController@GetIndex');
        Route::get('logout', 'backend\IndexController@Logout');


        //product
        Route::group(['prefix' => 'product'], function () {
            Route::get('add', 'backend\ProductController@GetAddProduct');
            Route::get('edit', 'backend\ProductController@GetEditProduct');
            Route::get('', 'backend\ProductController@GetListProduct');
        });
        //user
        Route::group(['prefix' => 'user'], function () {
            Route::get('add', 'backend\UserController@GetAddUser');
            Route::get('edit', 'backend\UserController@GetEditUser');
            Route::get('', 'backend\UserController@GetListUser');
        });
        //order
        Route::group(['prefix' => 'order'], function () {
            Route::get('detail', 'backend\OrderController@GetDetailOrder');
            Route::get('', 'backend\OrderController@GetOrder');
            Route::get('processed', 'backend\OrderController@GetProcessed');
        });
        //category
        Route::group(['prefix' => 'category'], function () {
            Route::get('', 'backend\CategoryController@GetCategory');
            Route::get('edit', 'backend\CategoryController@GetEditCategory');
        });


    });

//back-end
