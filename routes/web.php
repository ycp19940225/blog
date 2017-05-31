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
Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
    require (__DIR__ . '/Webs/Admin/AdminRoutes.php');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
