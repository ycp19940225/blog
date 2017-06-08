<?php
/**
 * Created by PhpStorm.
 * role: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\RoleServices;
use Illuminate\Http\Request;

class RoleController extends controller
{
    protected $role;
    public function __construct(RoleServices $roleServices)
    {
        $this->role=$roleServices;
    }
    /**
     * @name 后台管理员首页
     * @desc 后台管理员首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $data = $this->role->getAll();
        return view('admin.role.index',['data'=>$data,'title'=>'角色列表']);
    }

    /**
     * @name 添加管理员页面
     * @desc 添加管理员
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.role.edit',['title'=>'添加角色']);
    }

    /**
     * @name 添加操作
     * @desc 添加操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addOperate(Request $request){
        if($this->role->checkUnique($request->input('role_name'))){
            return response()->json(msg('error','该角色已存在！'));
        }
        if($this->role->saveRole($request)){
            return response()->json(msg('success','添加成功!'));
        }
        return response()->json(msg('error','添加失败！'));
    }

    /**@name 修改页面
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function edit($id){
        $data = $this->role->getOne($id);
        return view('admin.role.edit',['data'=>$data,'title'=>'编辑角色']);
    }
    /**
     * @name 修改操作
     * @desc 修改操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editOperate(Request $request){
        if($this->role->checkUnique($request->input('role_name'),$request->input('id'))){
            return response()->json(msg('error','该角色已存在！'));
        }
        if($this->role->updateRole($request->input())){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    public function delete(Request $request){
        if($this->role->delete($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }
}