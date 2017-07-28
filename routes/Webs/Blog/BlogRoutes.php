<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */

Route::get('/','IndexController@index');
Route::get('/article/{id}','IndexController@article')->where('id','[0-9]+');
Route::get('/search','SearchController@index');
Route::get('/auth/index','LoginController@index');
Route::get('/auth/{driver}', 'LoginController@redirectToProvider');
Route::get('/auth/github/callback', 'LoginController@handleProviderCallback');
Route::get('/logout', 'LoginController@logout');
//评论
Route::get('/getComments','CommentsController@getComments');
Route::post('/doComments','CommentsController@doComments');



