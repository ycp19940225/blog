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
        $data = $this->user->select();
        return view('admin.user.index',['data'=>$data,'title'=>'用户列表']);
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
           if($this->user->saveUser($request)){
               return redirect('admin/user/index');
               exit();
           }
        }
        return view('admin.user.edit');
    }

    /**
     * @return mixed
     * @internal param $获取信息
     * @desc（表结构）
     * @author ycp
     * @internal param Request $request
     */
    /*public function getTables(){
        return $this->user->getTables();
    }*/
}