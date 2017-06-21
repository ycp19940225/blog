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
use Illuminate\Http\Request;

class PrivilegeController extends controller
{
    protected $role;
    protected $pri;

    public function __construct(RoleServices $roleServices,PriServices $priServices)
    {
        $this->role=$roleServices;
        $this->pri=$priServices;
    }
    /**
     * @name 权限首页
     * @desc 权限首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($role_id)
    {
        $role = $this->role->getOne($role_id);
        $pris = $this->pri->getRolePris($role_id);
        return view('admin.pri.index',['role'   =>$role,'role_id'=>$role_id,'pris'=>$pris,'title'=>'权限列表']);
    }

    /**
     * @name 刷新权限
     * @desc 刷新权限
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        if($this->pri->update()){
            return response()->json(msg('success','刷新成功!'));
        }
        return response()->json(msg('error','刷新失败！'));
    }

    /**
     * @name 更新添加角色权限
     * @desc 更新添加角色权限
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRolePri(Request $request)
    {
        if($request->method() === 'POST'){
            $data = $request->input();
            unset($data['_token']);
           if($this->role->updateRolePri($data)){
               return redirect()->action('Admin\RoleController@index')->with('status', '编辑成功!');
           }
        }
        return redirect()->action('Admin\PrivilegeController@index')->with('status', '编辑失败!');
    }
}