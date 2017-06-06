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
     * @name 添加管理员页面
     * @desc 添加管理员
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.user.edit',['title'=>'添加用户']);
    }

    /**
     * @name 添加操作
     * @desc 添加操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addOperate(Request $request){
        if($this->user->checkUnique($request->input('adminname'))){
            return response()->json(msg('500','该用户名已存在！'));
        }
        if($this->user->saveUser($request)){
            return response()->json(msg('200','添加成功!'));
        }
        return response()->json(msg('500','添加失败！'));
    }

    /**@name 修改页面
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function edit($id){
        $data = $this->user->find($id);
        return view('admin.user.edit',['data'=>$data,'title'=>'编辑用户']);
    }
    /**
     * @name 修改操作
     * @desc 修改操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editOperate(Request $request){
        if($this->user->checkUnique($request->input('adminname'))){
            return response()->json(msg('500','该用户名已存在！'));
        }
        if($this->user->updateUser($request->input())){
            return response()->json(msg('200','添加成功!'));
        }
        return response()->json(msg('500','添加失败！'));
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