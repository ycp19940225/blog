<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\UserServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends controller
{
    protected $user;
    public function __construct(UserServices $userServices)
    {
        $this->user=$userServices;
    }
    /**
     * @name 后台管理员首页
     * @desc 后台管理员首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        return view('admin.user.index');
    }

    /**
     * @name 获取信息
     * @desc（表结构）
     * @author ycp
     * @param Request $request
     * @return mixed
     */
    public function getTables(){
        return $this->user->getTables();
    }

    /**
     * @name 添加管理员
     * @desc 添加管理员
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $res = $this->user->saveUser($request);
            if($res){
             return redirect()
                 ->route('admin.user.index');
            }
        }
        return view('admin.user.edit');
    }
}