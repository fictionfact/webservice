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
	Route::resource('mediafile', 'MediafileController', ['expect' => ['create','edit']]);
	Route::resource('barz','BarzController',['expect'=>['create','edit']]);
});
});