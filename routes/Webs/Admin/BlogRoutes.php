<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */

Route::get('/article/index','ArticleController@index');
Route::get('/article/add','ArticleController@add');
Route::post('/article/addOperate','ArticleController@addOperate');
Route::get('/article/edit/{id}','ArticleController@edit')->where('id', '[0-9]+');
Route::post('/article/editOperate','ArticleController@editOperate');
Route::post('/article/delete','ArticleController@delete');


