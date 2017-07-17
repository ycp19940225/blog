<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:33
 */

Route::get('/','IndexController@index');
Route::get('/article/{id}','IndexController@article')->where('id','[0-9]+');


