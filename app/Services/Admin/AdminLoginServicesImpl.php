<?php
/**
 * @name:
 * @desc:
 * Author: ycp
 * Date: 2017/6/22
 * Time: 9:43
 * Created by PhpStorm.
 */

namespace App\Services\Admin;


use App\Models\Admin\Users;
use App\Services\Ifs\Admin\AdminLoginServices;
use Session;

class AdminLoginServicesImpl implements AdminLoginServices
{
    const LOGIN_MARK_SESSION_KEY = 'LOGIN_MARK_SESSION';

    /**
     * 用户模型
     * @var object
     */
    private $userModel;

    /**
     * 初始化
     * @access public
     */
    public function __construct()
    {
        if( ! $this->userModel) $this->userModel = new Users();
    }

    /**
     * @name 判断登陆
     * @desc 判断登陆
     * @param $password
     * @param $username
     */
    public function check($password, $username)
    {
        return $this->userModel->doLogin($password,$username);
    }

    /**
     * @name 检测是否登陆
     * @desc
     * @return array
     */
    public function isLogin()
    {
        return SC::getLoginSession();
    }

    public function logout()
    {
        SC::delLoginSession();
    }
}