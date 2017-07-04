<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Common;


use App\Http\Controllers\Controller;
use App\Services\Admin\SC;
use App\Services\Ifs\Admin\RoleServices;
use App\Services\Ifs\Admin\UserServices;
use Illuminate\Http\Request;

class CommonController extends controller
{
    protected $user;
    protected $role;

    public function __construct(UserServices $userServices,RoleServices $roleServices)
    {
        $this->user=$userServices;
        $this->role=$roleServices;
    }
    /**
     * @name 个人中心
     * @desc 个人中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setting()
    {
        $user_info = $this->user->find(SC::getLoginSession()->id);
        return view('admin.user.setting',['data'=>$user_info,'title'=>'个人中心']);
    }

    /**
     * @name 个人设置
     * @desc 个人设置
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function doSetting(Request $request)
    {
        if($this->user->checkUnique($request->input('adminname'),$request->input('id'))){
            return response()->json(msg('error','该用户名已存在！'));
        }
        if($this->user->updateUser($request->input())){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    public function uploadLogo()
    {
        
    }

}