<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */
Route::get('/','IndexController@index');
Route::any('/user/add','adminController@add');
Route::any('/user/index','adminController@index');
Route::get('/user/tables','adminController@getTables');