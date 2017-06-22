<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:31
 */

namespace App\Services\Ifs\Admin;

interface AdminLoginServices
{
    //判断登陆
    public function check($password,$username);
    //判断是否已经登陆
    public function isLogin();

    public function logout();
}