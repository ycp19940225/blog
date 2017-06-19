<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */
//管理员
Route::get('/','IndexController@index');
Route::any('/user/add','AdminController@add');
Route::post('/user/addOperate','AdminController@addOperate');
Route::any('/user/index','AdminController@index');
Route::get('/user/tables','AdminController@getTables');
Route::get('/user/edit/{id}','AdminController@edit');
Route::post('/user/editOperate','AdminController@editOperate');
Route::post('/user/delete','AdminController@delete');
//角色
Route::any('/role/add','RoleController@add');
Route::post('/role/addOperate','RoleController@addOperate');
Route::get('/role/index','RoleController@index');
Route::get('/role/edit/{id}','RoleController@edit');
Route::post('/role/editOperate','RoleController@editOperate');
Route::post('/role/delete','RoleController@delete');
//管理员——角色
Route::get('/role/addUser/{id}','RoleController@addUser')->name('add-user');
Route::post('/user/addUserOperate','RoleController@addUserOperate');
//权限
Route::get('/Privilege/index/{role_id}','PrivilegeController@index')->name('pri-index');
Route::get('/Privilege/add','PrivilegeController@add')->name('pri-add');

