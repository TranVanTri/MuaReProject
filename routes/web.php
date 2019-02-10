<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'AdminAuth'], function() {

    Route::group(['prefix' => 'authadmin','middleware'=>'adminCheckLogin'], function()
    {
        Route::get('login','AuthController@getLogin');
        Route::post('login',['as'=>'loginAdmin','uses'=>'AuthController@postLogin']);
    });
    
    // Route::get('admin/register','AuthController@getRegister');
    // Route::post('admin/register','AuthController@postRegister');

    Route::get('admin/dashboard','AdminAuthController@getIndex');
    Route::get('admin/logout','AdminAuthController@getLogout');

    Route::get('admin/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('admin/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('admin/password/reset', 'ResetPasswordController@reset');
});

 
Route::group(['namespace' => 'UserController'], function() {
	Route::get('/home',['as'=>'trangchu','uses'=>'HomePageController@getHomePage']); 

    //set Cookie
    
    Route::get('/set-cookie/{id}', 'PlacesController@setCookie');

    //chitietdanhmuc

    Route::get('/danh-muc/{name}/{id}', 'CategoryDetail@getDanhMuc');

    Route::get('/danh-muc/{nameCate}/{idCate}/{hienthi}/{tinhtrang}/{gia}/{sapxep}/uy-tin-chat-luong', 'CategoryDetail@getCustomCategory')->name('danhmuc');

    Route::get('/chi-tiet-san-pham/{id}', ['as'=>'chitietsanpham','uses'=>'ProductController@getProduct']);

    Route::get('/dang-tin-dich-vu', function () {
        return view('user.dangtindichvu');
    });

    Route::get('/dang-tin-san-pham', function () {
        return view('user.dangtinsanpham');
    });

    Route::get('/gian-hang-cua-nguoi-dung/{id}', ['as'=>'gianhangcuanguoidung','uses'=>"UserPageController@getView"]); // còn service

    Route::get('/quan-ly-don-hang',['as'=>'quanlydonhang','uses'=>'UserPageController@getQuanLyDonHang']); // chưa xong, cần phần giỏ hàng

    Route::get('/san-pham/{id}',['as'=>'sanpham','uses'=>'ProductController@viewProduct']);


    Route::get('/tat-ca-tin-dang', function () {
        return view('user.tatcatindang');
    });

    Route::get('/user-quan-ly-kho-hang',['as'=>'userquanlykhohang','uses'=>'UserPageController@getUserQuanLyKhoHang']);

    Route::get('/dang-tin-chung', function () {
        return view('user.dangtinchung');
    });

    Route::get('/mua-quang-cao', function () {
        return view('user.muaquangcao');
    });

    Route::group(['middleware'=>'userCheckLogin'], function() {
        Route::get('login',['as'=>'loginUser','uses'=>'LoginUserController@getDangNhap']);
        Route::post('login','LoginUserController@postDangNhap');
    });  

    Route::get('logout','LoginUserController@getUserLogout');
    Route::post('register',['as'=>'postUserRegister','uses'=>'LoginUserController@postUserRegister']);

    
});













