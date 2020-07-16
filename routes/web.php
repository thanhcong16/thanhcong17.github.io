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
    Route::get('contact', 'frontend\IndexController@GetContact')->middleware('CheckLoginMember');
    Route::post('contact', 'frontend\IndexController@PostContact');

    Route::get('{slug_cate}.html', 'frontend\IndexController@GetPrdCate');
    Route::get('fillter', 'frontend\IndexController@GetFillter');

    ////đăng nhập
    Route::get('login', 'frontend\LoginController@GetLogin')->middleware('CheckLogout');
    Route::post('login', 'frontend\LoginController@PostLogin');
    ////đăng nhập

    ////Thành viên
    Route::group(['prefix' => 'member', 'middleware'=>'CheckLoginMember' ], function () {
        Route::get('/{info}', 'frontend\MemberController@GetMember' );
        Route::post('/{info}', 'frontend\MemberController@PostEditMember' );

        Route::get('editpassword/{info}', 'frontend\MemberController@GetPassword' );
        Route::post('editpassword/{info}', 'frontend\MemberController@PostEditPassword' );

        Route::get('logout/{info}', 'frontend\IndexController@GetLogout' );

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
        Route::get('{slug_prd}.html', 'frontend\ProductController@GetDetail');
        Route::get('', 'frontend\ProductController@GetShop');
    });
    ////Sản phẩm

    ////Thanh toán
    Route::group(['prefix' => 'checkout',], function () {
        Route::get('', 'frontend\CheckOutController@GetCheckout')->middleware('CheckLoginMember');
        Route::post('', 'frontend\CheckOutController@PostCheckout');
        Route::get('complete/{order}', 'frontend\CheckOutController@GetComplete')->middleware('CheckLoginMember');

    });
    ////Thanh toán

    ////Giỏ hàng
    Route::group(['prefix' => 'cart'], function () {
        Route::get('', 'frontend\CartController@GetCart');
        Route::get('add', 'frontend\CartController@AddCart');
        Route::get('update/{rowId}/{qty}', 'frontend\CartController@UpdateCart');
        Route::get('del/{rowId}', 'frontend\CartController@DelCart');
    });
    ////Giỏ hàng


    ////errors
    Route::group(['prefix' => 'errors'],function(){
        Route::get('', 'ErrorsController@GetErrors');
    });

    ////lịch sử giao dịch
    Route::group(['prefix' => 'history'],function(){
        Route::get('', 'frontend\HistoryController@GetExchange');
        Route::get('del/{id_order}', 'frontend\HistoryController@DelOrder');

        Route::get('/detail-product/{id_order}', 'frontend\HistoryController@GetDetail');

    });
//front-end

//back-end


    Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {
        Route::get('', 'backend\IndexController@GetIndex');
        Route::get('logout', 'backend\IndexController@Logout');


        //product
        Route::group(['prefix' => 'product'], function () {
            Route::get('add', 'backend\ProductController@GetAddProduct');
            Route::post('add', 'backend\ProductController@PostAddProduct');

            Route::get('edit/{id_product}', 'backend\ProductController@GetEditProduct');
            Route::post('edit/{id_product}', 'backend\ProductController@PostEditProduct');
            Route::get('del/{id_product}', 'backend\ProductController@DelProduct');

            Route::get('', 'backend\ProductController@GetListProduct');
        });
        //user
        Route::group(['prefix' => 'user'], function () {
            Route::get('add', 'backend\UserController@GetAddUser');
            Route::post('add', 'backend\UserController@PostAddUser');
            Route::get('edit/{id_user}', 'backend\UserController@GetEditUser');
            Route::post('edit/{id_user}', 'backend\UserController@PostEditUser');
            Route::get('del/{id_user}', 'backend\UserController@DelUser');

            Route::get('', 'backend\UserController@GetListUser');
        });
        //order
        Route::group(['prefix' => 'order'], function () {
            Route::get('detail/{id_order}', 'backend\OrderController@GetDetailOrder');
            Route::get('paid/{id_order}', 'backend\OrderController@Paid');

            Route::get('', 'backend\OrderController@GetOrder');
            Route::get('processed', 'backend\OrderController@GetProcessed');
            Route::get('del/{id_order}', 'backend\OrderController@DelOrder');

        });
        //category
        Route::group(['prefix' => 'category'], function () {
            Route::get('', 'backend\CategoryController@GetCategory');
            Route::post('', 'backend\CategoryController@PostCategory');

            Route::get('edit/{id_categorys}', 'backend\CategoryController@GetEditCategory');
            Route::post('edit/{id_categorys}', 'backend\CategoryController@PostEditCategory');

            Route::get('del/{id_categorys}', 'backend\CategoryController@DelCategory');

        });
        //feedback
        Route::group(['prefix' => 'feedback'], function () {
            Route::get('', 'backend\FeedbackController@GetFeedback');
            Route::get('/{id_feedback}', 'backend\FeedbackController@ShowHide');
            Route::get('del/{id_feedback}', 'backend\FeedbackController@Del');

        });

    });

//back-end
