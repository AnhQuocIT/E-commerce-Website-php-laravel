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
		Route::group(['prefix'=>'product-type'],function(){
			Route::get('/','CategoryController@getCategory');
			Route::post('/','CategoryController@postCategory');

			Route::get('edit/{id}','CategoryController@getEditCategory');
			Route::post('edit/{id}','CategoryController@postEditCategory');

			Route::get('delete/{id}','CategoryController@getDeleteCategory');
		});

		Route::group(['prefix'=>'product-label'],function(){
			Route::get('/','CategoryController@getLabelProduct');
			Route::post('/','CategoryController@postLabelProduct');

			Route::get('edit/{id}','CategoryController@getEditLabelProduct');
			Route::post('edit/{id}','CategoryController@postEditLabelProduct');

			Route::get('delete/{id}','CategoryController@getDeleteLabelProduct');
		});

		Route::group(['prefix'=>'slide'], function(){
			Route::get('/','SlideController@getSlide');
			Route::post('/','SlideController@postSlide');

			Route::get('edit/{id}','SlideController@getEditSlide');
			Route::post('edit/{id}','SlideController@postEditSlide');

			Route::get('delete/{id}','SlideController@getDeleteSlide');
		});

		Route::group(['prefix'=>'products'], function(){
			Route::get('/','ProductController@getProduct');
			Route::post('/','ProductController@postProduct');

			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteProduct');
		});

		Route::group(['prefix'=>'member'], function(){
			Route::get('/','CustomerController@getMember');

			Route::get('edit/{id}','CustomerController@getEditMember');
			Route::post('edit/{id}','CustomerController@postEditMember');

			Route::get('delete/{id}','CustomerController@getDeleteMember');
		});

		Route::group(['prefix'=>'customer'], function(){
			Route::get('/','CustomerController@getCustomer');

			Route::get('edit/{id}','CustomerController@getEditCustomer');
			Route::post('edit/{id}','CustomerController@postEditCustomer');

			Route::get('delete/{id}','CustomerController@getDeleteCustomer');
		});

		Route::group(['prefix'=>'bill-waiting'], function(){
			Route::get('/','BillController@getWaitBill');

			Route::get('detail/{id}','BillController@getBillDetail');

			Route::get('deleteDetail/{id}','BillController@getDeleteDetail');

			Route::get('delete/{id}','BillController@getDeleteBill');
		});

		Route::group(['prefix'=>'bill-paid'], function(){
			Route::get('/','BillController@getPaidBill');

			Route::get('detail/{id}','BillController@getBillDetail');

			Route::get('delete/{id}','BillController@getDeleteBill');
		});

		Route::group(['prefix'=>'news'], function(){
			Route::get('/','NewsController@getNews');
		});
	});

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
