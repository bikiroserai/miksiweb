<?php

    Route::get('login','HomeController@logIn')->name('login');
    Route::post('login','HomeController@logInAction');


    Route::get('signup','HomeController@signUp')->name('signup');
    Route::post('signup','HomeController@signUpAction');


Route::group(['namespace'=>'Back', 'prefix'=>'admin'], function (){
        Route::get('/','DashboardController@index')->name('admin');
        Route::get('add-products','AdminController@addProducts')->name('add-products');
        Route::post('add-products','AdminController@addProductsAction');
        Route::get('show-products','AdminController@showProducts')->name('show-products');
        Route::post('product-status','AdminController@updateProductStatus')->name('product-status');
        Route::get('edit-product/{id}','AdminController@editProduct')->name('edit-products');
        Route::post('edit-product','AdminController@editProductAction');

        Route::get('users','AdminController@usersList')->name('users');
        Route::post('user-status','AdminController@updateUserStatus')->name('user-status');

        Route::get('category','AdminController@category')->name('category');
        Route::post('category','AdminController@addCategoryAction');

        Route::get('page','AdminController@pages')->name('page');
        Route::post('page','AdminController@addPageAction');

        Route::get('all-table','AdminController@allTable')->name('all-table');

        Route::get('delete-page/{id}','AdminController@deletePage');
        Route::get('delete-category/{id}','AdminController@deleteCategory');

        Route::post('category-status-update','AdminController@updateCategoryStatus')->name('category-status-update');
        Route::post('page-status-update','AdminController@updatePageStatus')->name('page-status-update');

        Route::get('selectCategory','AdminController@selectCategory')->name('selectCategory');

    Route::get('add-images','AdminController@addImage')->name('add-images');
    Route::post('add-images','AdminController@addImageAction');

    Route::get('user-orders','AdminController@orders')->name('orders');
//    Route::post('user-orders','AdminController@addImageAction');

    Route::get('admin-logout','AdminController@logOut')->name('admin-logout');
});

Route::group(['namespace'=>'Front'],function(){
    Route::get('/','AppController@index')->name('home');
    Route::get('home','AppController@index');

    Route::get('cart','CartController@getAddtocardInfo')->name('cart');
    Route::get('cart-item','CartController@index')->name('cart-item');
    Route::get('remove-cart/{id}','CartController@removeCart');

    Route::get('about','AppController@about');
    Route::get('design','AppController@design');
    Route::get('single/{id}','AppController@single_page');

    Route::get('register','AppController@register')->name('register');
    Route::post('register','AppController@registerAction');

    Route::post('user-login','AppController@loginAction')->name('user-login');

    Route::get('user-login','AppController@logOut')->name('logout');

    Route::get('category/{id}','AppController@categoryItems');


});
Route::group(['namespace'=>'Front','middleware'=>'auth'], function (){
    Route::get('checkout','CheckoutController@checkOut')->name('checkout');
    Route::post('checkout','CheckoutController@checkOutAction');

    Route::get('profile','AppController@profile')->name('profile');
    Route::post('order-status','AppController@orderStatus')->name('order-status');
});
