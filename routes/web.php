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

/*Route::get('/', function () {
    return view('welcome');
});*/
//backend  , 'middleware'=>'admin'
Route::group(['prefix'=>'admin','middleware'=>'admin', 'namespace'=>'Admin'], function(){
    require (__DIR__ . '/Webs/Admin/AdminRoutes.php');
});
//后台登陆
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/doLogin','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');

//pusher

//blog
//backend  , 'middleware'=>'admin'
Route::group(['prefix'=>'blog','middleware'=>'web', 'namespace'=>'Blog'], function(){
    require (__DIR__ . '/Webs/Blog/BlogRoutes.php');
});

//vue
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
