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
//backend  , 'middleware'=>'admin'
Route::group(['prefix'=>'admin','middleware'=>'admin', 'namespace'=>'Admin'], function(){
    require (__DIR__ . '/Webs/Admin/AdminRoutes.php');
});
//登陆
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/doLogin','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');

//pusher-test
Route::get('/bridge', function() {
    $pusher = new Pusher(  env('PUSHER_KEY'),
             env('PUSHER_SECRET'),
            env('PUSHER_APP_ID'),
        array('cluster' => 'ap1')
        );
    $res = $pusher->trigger( 'my-channel',
        'my-event',
        ['text' => 'I Love China!!!']
    );
    dd($res);
    return 'This is a Laravel Pusher Bridge Test!55'.$res;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
