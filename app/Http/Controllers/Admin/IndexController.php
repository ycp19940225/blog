<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Admin\SC;
use App\Services\Admin\UserServicesImpl;

class IndexController extends controller
{

    /**
     * @name 后台首页
     * @desc 后台首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserServicesImpl $userServicesImpl)
    {
        $admin_info = $userServicesImpl->find(SC::getLoginSession()->id);
        return view('admin.index.index',['admin_info'=>$admin_info]);
    }

}