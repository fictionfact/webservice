<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1'],function(){
	Route::post('/login_check','AuthenticateController@authenticate');
	Route::group(['middleware'=>['jwt.auth']], function(){
		Route::resource('itag','ItagController',['except'=>['create','edit']]);
		Route::resource('item','ItemController',['except'=>['create','edit']]);
		Route::resource('shop','ShopController',['except'=>['create','edit']]);
		Route::resource('stag','StagController',['except'=>['create','edit']]);
		Route::resource('user','UserController',['except'=>['create','edit']]);

		Route::resource('order','OrderController',['except'=>['create','edit']]);
		Route::resource('password_reset','PasswordResetController',['except'=>['create','edit']]);
		Route::resource('revision','RevisionController',['except'=>['create','edit']]);
		Route::resource('customer','customercontroller',['except'=>['create','edit']]);
		Route::resource('shop_location','ShopLocationcontroller',['except'=>['create','edit']]);
		Route::resource('shop_owner','ShopOwnercontroller',['except'=>['create','edit']]);
		Route::resource('shop_stag','ShopStagcontroller',['except'=>['create','edit']]);
	});
	
});