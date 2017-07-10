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

class ArticleController extends controller
{
    protected $role;
    protected $user;

    public function __construct(RoleServices $roleServices,UserServices $userServices)
    {
        $this->role=$roleServices;
        $this->user=$userServices;
    }
    /**
     * @name 博客首页
     * @desc 博客首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->role->getAll();
        return view('admin.role.index',['data'=>$data,'title'=>'角色列表']);
    }

}