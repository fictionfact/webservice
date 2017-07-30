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
		Route::resource('Shop','ShopController',['except'=>['create','edit']]);
		Route::resource('Stag','StagController',['except'=>['create','edit']]);
		Route::resource('User','UserController',['except'=>['create','edit']]);
		Route::resource('order','OrderController',['except'=>['create','edit']]);
		Route::resource('password_reset','PasswordResetController',['except'=>['create','edit']]);
		Route::resource('revision','RevisionController',['except'=>['create','edit']]);
		Route::resource('customer','customerController',['except'=>['create','edit']]);
	});
	
});