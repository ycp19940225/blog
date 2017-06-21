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
use App\Services\Ifs\Admin\UserServices;
use DB;
use Illuminate\Http\Request;

class RoleController extends controller
{
    protected $role;
    protected $user;

    public function __construct(RoleServices $roleServices,UserServices $userServices)
    {
        $this->role=$roleServices;
        $this->user=$userServices;
    }
    /**
     * @name 后台角色首页
     * @desc 后台角色首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->role->getAll();
//        $test = config('nav.NAV');
//        dd($test);
        return view('admin.role.index',['data'=>$data,'title'=>'角色列表']);
    }

    /**
     * @name 添加角色页面
     * @desc 添加角色
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
    public function addOperate(Request $request)
    {
        if($this->role->checkUnique($request->input('role_name'))){
            return response()->json(msg('error','该角色已存在！'));
        }
        if($this->role->saveRole($request)){
            return response()->json(msg('success','添加成功!'));
        }
        return response()->json(msg('error','添加失败！'));
    }

    /**
     * @name 修改页面
     * @desc 修改页面
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function edit($id)
    {
        $data = $this->role->getOne($id);
        return view('admin.role.edit',['data'=>$data,'title'=>'编辑角色']);
    }
    /**
     * @name 修改操作
     * @desc 修改操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editOperate(Request $request)
    {
        if($this->role->checkUnique($request->input('role_name'),$request->input('id'))){
            return response()->json(msg('error','该角色已存在！'));
        }
        if($this->role->updateRole($request->input())){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    /**
     * @name 删除角色
     * @desc 删除角色
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        if($this->role->delete($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }

    /**
     * @name 为管理员分配角色列表
     * @desc 为管理员分配角色
     *  foreach($role_user->roles as $k=>$v){
     *          dd($v->id);
     *         }
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser($id)
    {
        $data = $this->role->getAll();
        $user = $this->user->find($id);
        $data = check_roles($data,$user);
        return view('admin.role.add_user',['data'=>$data,'user_id'=>$id,'title'=>'编辑角色']);
    }

    /**
     * @name 为管理员分配角色操作
     * @desc 为管理员分配角色
     * @return \Illuminate\Http\JsonResponse
     */
    public function addUserOperate(Request $request)
    {
        $data = $request->input();
        unset($data['status'],$data['_token']);
        if($request->input('status') == 0){
            $rs =DB::table('blog_admin_role')->where($data)->delete();
            if(!$rs) {
                return response()->json(msg('error', '修改失败!'.$rs));
            }
        }else{
            $rs =DB::table('blog_admin_role')->insert($data);
            if(!$rs){
                return response()->json(msg('error','添加失败!'));
            }
        }
        return response()->json(msg('success','修改成功!'));
    }

}