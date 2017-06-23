<?php
/**
 * @name:
 * @desc:
 * Author: ycp
 * Date: 2017/6/22
 * Time: 16:31
 * Created by PhpStorm.
 */

namespace App\Services\Admin;

use Session,Cookie,Request;

class SC
{
    const LOGIN_MARK_SESSION_KEY = 'BLOG_ADMIN_LOGIN_MARK';
    /**
     * 设置用户权限的key
     */
    CONST USER_ACL_SESSION_KEY = 'BLOG_ADMIN_ACL_SESSION';

    /**
     * 所有的权限的key
    */
    CONST ALL_PERMISSION_KEY = 'BLOG_ADMIN_PERMISSION_KEY';



    /**
     * 设置登录成功的session
     *
     * @param array $userInfo 用户的相关信息
     */
    static public function setLoginSession($userInfo)
    {
        return session()->put(self::LOGIN_MARK_SESSION_KEY,$userInfo);
    }

    /**
     * 返回登录成功的session
     * @return array
     */
    static public function getLoginSession()
    {
        return Session::get(self::LOGIN_MARK_SESSION_KEY);
    }

    /**
     * @name 退出登陆
     * @desc
     * @return void
     */
    public static function delLoginSession()
    {
       session()->forget(self::LOGIN_MARK_SESSION_KEY);
       Session::flush();
       Session::regenerate();
    }

    /**
     * 将用户权限存入session
     * @param $access
     */
    public static function setUserAccess($access)
    {
        session()->put('BLOG_ADMIN_ACL_SESSION',$access);
    }

    /**
     *获取用户权限
     */
    public static function getUserAccess()
    {
        return session()->get('BLOG_ADMIN_ACL_SESSION');
    }

    /**
     * 存入所有权限
     * @param $access
     */
    public static function setAllAccess($access)
    {
        session()->put('BLOG_ADMIN_ACL_SESSION',$access);
    }

    /**
     * 获取所有权限
     */
    public static function getAllAccess()
    {
        return session()->get('BLOG_ADMIN_ACL_SESSION');
    }
}