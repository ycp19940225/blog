<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */
//文章
Route::get('/article/index','ArticleController@index');
Route::get('/article/add','ArticleController@add');
Route::post('/article/addOperate','ArticleController@addOperate');
Route::get('/article/edit/{id}','ArticleController@edit')->where('id', '[0-9]+');
Route::post('/article/editOperate','ArticleController@editOperate');
Route::post('/article/delete','ArticleController@delete');
Route::get('/article/getTags','ArticleController@getTags');
//分类
Route::get('/cat/index','CatController@index');
Route::get('/cat/add','CatController@add');
Route::post('/cat/addOperate','CatController@addOperate');
Route::get('/cat/edit/{id}','CatController@edit')->where('id', '[0-9]+');
Route::post('/cat/editOperate','CatController@editOperate');
Route::post('/cat/delete','CatController@delete');
//标签
Route::get('/tag/index','TagController@index');
Route::get('/tag/add','TagController@add');
Route::post('/tag/addOperate','TagController@addOperate');
Route::get('/tag/edit/{id}','TagController@edit')->where('id', '[0-9]+');
Route::post('/tag/editOperate','TagController@editOperate');
Route::post('/tag/delete','TagController@delete');
//评论
Route::get('/comments/index','CommentsController@index');
Route::post('/comments/delete','CommentsController@delete');

