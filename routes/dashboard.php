<?php

use Illuminate\Support\Facades\Route;


//Main_Dashboard
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard'], function () {

//for HomeDashboard
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        });//auth


//for login
        Route::group(['middleware' => 'guest:admin'], function () {
            Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
            Route::post('login', 'LoginController@login')->name('admin.login');
        });//guest

        Route::group(['middleware' => 'auth:admin'], function () {

//for logout
            Route::post('logout', 'LoginController@logout')->name('logout.admin');

//for Moderators
            Route::resource('moderator', 'ModeratorController');

//for Categories
            Route::resource('category', 'CategoryController');

//for Brands
            Route::resource('brand', 'BrandController');

//for Products
            Route::resource('product', 'ProductController');

//for Clients
            Route::resource('client', 'ClientController');
            Route::resource('client.order', 'Client\OrderController');//order client

//for Orders
            Route::resource('order', 'OrderController');
            Route::get('/order/{order}/products', 'OrderController@products')->name('order.products');

//for Blog
            Route::resource('blog', 'BlogController');
            Route::get('blog.get', 'BlogController@get')->name('blog.get');
            Route::post('blog.get/{id}', 'BlogController@change')->name('blog.change');

//for Orders
            Route::resource('setting', 'SettingController');


        });//auth

    });//for admin
});//for lang
