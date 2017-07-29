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
		Route::resource('itag','ItagController',['expect'=>['create','edit']]);
		Route::resource('item','ItemController',['expect'=>['create','edit']]);
		Route::resource('Shop','ShopController',['expect'=>['create','edit']]);
		Route::resource('Stag','StagController',['expect'=>['create','edit']]);
		Route::resource('User','UserController',['expect'=>['create','edit']]);
	});
	
});