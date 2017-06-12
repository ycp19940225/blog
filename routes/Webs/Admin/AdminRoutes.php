<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */
//管理员
Route::get('/','IndexController@index');
Route::any('/user/add','adminController@add');
Route::post('/user/addOperate','adminController@addOperate');
Route::any('/user/index','adminController@index');
Route::get('/user/tables','adminController@getTables');
Route::get('/user/edit/{id}','adminController@edit');
Route::post('/user/editOperate','adminController@editOperate');
Route::post('/user/delete','adminController@delete');
//角色
Route::any('/role/add','roleController@add');
Route::post('/role/addOperate','roleController@addOperate');
Route::get('/role/index','roleController@index');
Route::get('/role/edit/{id}','roleController@edit');
Route::post('/role/editOperate','roleController@editOperate');
Route::post('/role/delete','roleController@delete');
//管理员——角色
Route::get('/role/user/{id}','roleController@addUser');
Route::post('/user/addUserOperate','roleController@addUserOperate');
//权限
Route::get('/pri/index','PrivilegeController@index');

