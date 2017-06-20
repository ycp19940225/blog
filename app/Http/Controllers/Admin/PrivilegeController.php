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
    public function index($role_id){
        $role = $this->role->getOne($role_id);
        return view('admin.pri.index',['role'=>$role,'title'=>'权限列表']);
    }

    /**
     * @name 刷新权限
     * @desc 刷新权限
     * @return \Illuminate\Http\JsonResponse
     */
    public function addOperate(){
        if($this->pri->update()){
            return response()->json(msg('success','刷新成功!'));
        }
        return response()->json(msg('error','刷新失败！'));
    }
}