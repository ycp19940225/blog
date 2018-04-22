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
/*******************************backend*********************************/
Route::group(['prefix'=>'admin','middleware'=>'admin', 'namespace'=>'Admin'], function(){
    require (__DIR__ . '/Webs/Admin/AdminRoutes.php');
    require (__DIR__ . '/Webs/Admin/BlogRoutes.php');
});
//不做权限公共部分
Route::group(['prefix'=>'common','middleware'=>'admin', 'namespace'=>'Common'], function(){
    //个人设置
    Route::get('/setting','CommonController@setting');
    Route::post('/doSetting','CommonController@doSetting');
    Route::match(['get','post'],'/uploadLogo','CommonController@uploadLogo');
    Route::post('/upLogo','CommonController@upLogo');
    //博客图片
    Route::post('/upBlogImg','CommonController@upBlogImg');

});

//不做权限，登陆
Route::group(['prefix'=>'admin','middleware'=>'web', 'namespace'=>'Admin'], function(){
    //后台登陆
    Route::get('/login','LoginController@login');
    Route::post('/doLogin','LoginController@doLogin');
    Route::get('/logout','LoginController@logout');
});


/********************************blog**********************************/
Route::get('/', function () {
    return view('blog.index');
});
Route::group(['prefix'=>'blog','middleware'=>'web', 'namespace'=>'Blog'], function(){
    require (__DIR__ . '/Webs/Blog/BlogRoutes.php');
});


//vue
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//微信测试
Route::get('/wx', 'Weixin\TestController@test');


