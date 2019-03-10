<?php

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

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'admin/login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	Route::get('admin/forgot-password','LoginController@getForgotPassword');
	Route::get('logout','HomeController@getLogout');
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('home','HomeController@getHome');
		Route::group(['prefix'=>'category'],function(){
			Route::get('/','CategoryController@getCategory');
		});

		Route::group(['prefix'=>'slide'], function(){
			Route::get('/','SlideController@getSlide');
		});

		Route::group(['prefix'=>'products'], function(){
			Route::get('/','ProductController@getProduct');
		});

		Route::group(['prefix'=>'member'], function(){
			Route::get('/','CustomerController@getMember');
		});

		Route::group(['prefix'=>'customer'], function(){
			Route::get('/','CustomerController@getCustomer');
		});
	});

});