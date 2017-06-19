<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\PriServices;
use App\Services\Ifs\Admin\RoleServices;
use App\Services\Ifs\Admin\UserServices;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ReflectionClass;

class PrivilegeController extends controller
{
    protected $user;
    protected $role;
    protected $pri;

    public function __construct(UserServices $userServices,RoleServices $roleServices,PriServices $priServices)
    {
        $this->user=$userServices;
        $this->role=$roleServices;
        $this->pri=$priServices;
    }
    /**
     * @name 权限首页
     * @desc 权限首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($role_id){
        $role = $this->role->getOne($role_id);
        return view('admin.pri.index',['role'=>$role,'title'=>'权限列表']);
    }



    /**
     * @name 添加权限页面
     * @desc 添加权限页面
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $res =$this->pri->save();
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
            return response()->json(msg('error','该用户名已存在！'));
        }
        if($this->user->saveUser($request)){
            return response()->json(msg('success','添加成功!'));
        }
        return response()->json(msg('error','添加失败！'));
    }

    /**
     * @name 修改页面
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
        if($this->user->checkUnique($request->input('adminname'),$request->input('id'))){
            return response()->json(msg('error','该用户名已存在！'));
        }
        if($this->user->updateUser($request->input())){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    /**
     * @name 删除权限
     * @desc 删除权限
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request){
        if($this->user->updatePri($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }
}