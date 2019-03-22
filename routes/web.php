<?php

Route::get('/', function () {
    return view('welcome');
});

//admin manager
Route::group(['namespace' => 'AdminManager'], function() {

    Route::group(['prefix' => 'admin', 'middleware'=>'adminCheckLogout'], function() {

        // Edit admin info
        Route::get('edit/{id}', 'AdminController@getEdit');
        Route::post('edit/{id}', 'AdminController@postEdit');

        
        /* Product*/
        Route::group(['prefix' => 'product'], function() {
            Route::get('list', 'ProductController@getList');
            // Route::get('add', 'ProductController@getAdd');
            // Route::post('add', 'ProductController@postAdd');
            // Route::get('edit/{id}', 'ProductController@getEdit');
            // Route::post('edit/{id}', 'ProductController@postEdit');
            Route::get('enable/{id}/{option}', 'ProductController@getEnable');
            Route::get('view-info-user/{id}', 'ProductController@getInforUser');
            Route::get('view-info-pro/{id}', 'ProductController@getInforPro');
           
        });

        /* TinDang*/
        Route::group(['prefix' => 'tindang'], function() {
            Route::get('list', 'TinDangController@getList');
            // Route::get('add', 'TinDangController@getAdd');
            // Route::post('add', 'TinDangController@postAdd');
            // Route::get('edit/{id}', 'TinDangController@getEdit');
            // Route::post('edit/{id}', 'TinDangController@postEdit');
            Route::get('enable/{id}/{option}', 'TinDangController@getEnable');
            Route::get('view-info-user/{id}', 'ProductController@getInforUser');
            Route::get('view-info-tindang/{id}', 'TinDangController@getInforTinDang');
           
        });

        /* Dich vu*/
        Route::group(['prefix' => 'dichvu'], function() {
            Route::get('list', 'ServiceController@getList');
            // Route::get('add', 'TinDangController@getAdd');
            // Route::post('add', 'TinDangController@postAdd');
            // Route::get('edit/{id}', 'TinDangController@getEdit');
            // Route::post('edit/{id}', 'TinDangController@postEdit');
            Route::get('enable/{id}/{option}', 'ServiceController@getEnable');
            Route::get('view-info-user/{id}', 'ProductController@getInforUser');
            Route::get('view-info-dichvu/{id}', 'ServiceController@getInforDichVu');
           
        });




        /*------------------------------------------------------------------*/
        /* Category*/
        Route::group(['prefix' => 'category'], function() {
            Route::get('list', 'CategoryController@getList');
            Route::get('add', 'CategoryController@getAdd');
            Route::post('add', 'CategoryController@postAdd');
            Route::get('edit/{id}', 'CategoryController@getEdit');
            Route::post('edit/{id}', 'CategoryController@postEdit');
            Route::get('enable/{id}', 'CategoryController@getEnable');
            // Route::get('view-history-cate-group/{id}', 'CategoryGroupController@getHistory');
        });

        // place
        Route::group(['prefix' => 'place'], function() {
            Route::get('list', 'PlaceController@getList');
            Route::get('add', 'PlaceController@getAdd');
            Route::post('add', 'PlaceController@postAdd');
            Route::get('edit/{id}', 'PlaceController@getEdit');
            Route::post('edit/{id}', 'PlaceController@postEdit');
            Route::get('enable/{id}', 'PlaceController@getEnable');
            // Route::get('view-history-cate-group/{id}', 'CategoryGroupController@getHistory');
        });


        /* Logo*/
        Route::group(['prefix' => 'logo'], function() {
            Route::get('list', 'logoController@getList');
            Route::get('add', 'logoController@getAdd');
            Route::post('add', 'logoController@postAdd');
            Route::get('edit/{id}', 'logoController@getEdit');
            Route::post('edit/{id}', 'logoController@postEdit');
            Route::get('delete/{id}', 'logoController@getDelete');
            // Route::get('view-history-slide/{id}', 'SlideController@getHistory');

        });

        /*User*/
        Route::group(['prefix' => 'user'], function() {
            Route::get('list', 'UserController@getList');
            // Route::get('add', 'UserController@getAdd');
            // Route::post('add', 'UserController@postAdd');
            Route::get('edit/{id}', 'UserController@getEdit');
            Route::post('edit/{id}', 'UserController@postEdit');
            Route::get('enable/{id}', 'UserController@getEnable');
            // Route::get('delete/{id}', 'UserController@getDelete');
        });
        // Route::post('/imageupload', 'ImageUpLoadController@upLoadFiles');
        // Route::get('/imageview/{category}', 'ImageUpLoadController@viewImage');
        // Route::post('/imageremove', 'ImageUpLoadController@removeImage');
    });


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

 
Route::group(['namespace' => 'UserController' , 'middleware'=>'userCheckLogout'], function() {
	Route::get('/home',['as'=>'trangchu','uses'=>'HomePageController@getHomePage']); 

    //set Cookie
    Route::get('/set-cookie/{id}', 'PlacesController@setCookie');

    //chitietdanhmuc

    Route::get('/danh-muc/{name}/{id}', 'CategoryDetail@getDanhMuc');

    Route::get('/danh-muc/{nameCate}/{idCate}/{hienthi}/{tinhtrang}/{gia}/{sapxep}/uy-tin-chat-luong', 'CategoryDetail@getCustomCategory')->name('danhmuc');
    Route::get('/getUserId', 'CategoryDetail@getUserId')->name('danhmuc.getuserid');
    Route::get('/getProductComment', 'CategoryDetail@getComment')->name('danhmuc.getcomment');
    Route::get('/getSubComment', 'CategoryDetail@getSubComment')->name('danhmuc.getsubcomment');
    Route::get('/postSubComment', 'CategoryDetail@postSubComment')->name('danhmuc.postsubcomment');
    Route::get('/getSeller', 'CategoryDetail@getSeller')->name('danhmuc.getseller');
    /*Route::post('/danh-muc/{nameCate}/{idCate}/{hienthi}/{tinhtrang}/{gia}/{sapxep}/uy-tin-chat-luong/2', 'CategoryDetail@getComment')->name('danhmuc.postcomment');*/
    

    /*Route::get('/danh-muc/{nameCate}/{idCate}/{hienthi}/{tinhtrang}/{gia}/{sapxep}/uy-tin-chat-luong/modal', 'CategoryDetail@getComment')->name('danhmuc');*/
    //search
    Route::get('/search', 'SearchController@getIndex');
    Route::get('/search/{hienthi}/{text}/{idCate}/{sapxep}', 'SearchController@getSearchPost')->name('searchtindang');
    Route::get('/search/{hienthi}/{text}/{idCate}/{tinhtrang}/{gia}/{sapxep}', 'SearchController@getSearchProduct')->name('searchproduct');

    Route::get('/chi-tiet-tin-dang/{id}',
               ['as'=>'chitiettindang','uses'=>'ServiceController@getTinDang']);

    /* Lay chi tiet san pham va dich vu theo id*/
    // tra về chi tiet san pham theo id
    Route::get('/san-pham/{id}',['as'=>'sanpham','uses'=>'ProductController@viewProduct']);
    // trả về chi tiet dich vu theo id của url
    Route::get('/dich-vu/{id}',
               ['as'=>'chitietdichvu','uses'=>'PostController@getDichVu']);

    /****---------****-- -----***---------***------- */

    /*  dang tin san pham va dich vu*/
    Route::get('/dang-tin-dich-vu', function () {
        return view('user.dangtindichvu');
    });

    Route::get('/dang-tin-san-pham',['as'=>'getdangtinsanpham','uses'=>'PostController@postProduct']);
    Route::post('/dang-tin-san-pham','PostController@addNewProduct');


    Route::get('/dang-tin-chung', function () {
        return view('user.dangtinchung');
    });

    //----------------------------------------------
    Route::get('/gian-hang-cua-nguoi-dung', ['as'=>'gianhangcuanguoidung','uses'=>"UserPageController@getView"]); // xong

    Route::get('/quan-ly-don-hang',['as'=>'quanlydonhang','uses'=>'UserPageController@getQuanLyDonHang']); // chưa xong, cần phần giỏ hàng
    Route::get('/quan-ly-kho-hang',['as'=>'userquanlykhohang','uses'=>'UserPageController@getUserQuanLyKhoHang']);

    Route::get('/quan-ly-tin-dang',['as'=>'userquanlytindang','uses'=>'UserPageController@viewUserQuanLyTinDang']);
    Route::post('/xoa-tin-dang',['as'=>'xoatindang','uses'=>"UserPageController@xoaTinDang"]);
    Route::get('/change-status-bill',"UserPageController@changeStatusBill");


    //--------------------



    Route::get('/tat-ca-tin-dang',['as'=>'tatcatindang','uses'=>'ServiceController@viewAllServices']); // 



    

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













