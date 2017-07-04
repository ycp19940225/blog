<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Services\Admin\AdminLoginServicesImpl;
use App\Services\Admin\SC;
use App\Services\Ifs\Admin\AdminLoginServices;
use App\Services\Ifs\Admin\UserServices;
use DB;
use Illuminate\Http\Request;


class loginController extends controller
{
    protected $user;
    protected $loginServices;

    public function __construct(UserServices $userServices,AdminLoginServices $adminLoginServices)
    {
        $this->user=$userServices;
        $this->loginServices=$adminLoginServices;
    }
    /**
     * @name 后台首页
     * @desc 后台首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('admin.login.login');
    }

    /**
     * @name 登陆操作
     * @desc 登陆操作
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogin(Request $request)
    {
        $adminname = $request->input('adminname');
        $password = $request->input('password');
        if(!captcha_check($request->input('captcha'))){
            return back()->withInput()->with('error','验证码错误！');
        }
        $is_login = $this->loginServices->check($password,$adminname);
        if($is_login){
            SC::setLoginSession($is_login);
            $admin_id = $is_login->id;
            $access = DB::table('blog_admin_role as a')
                ->Join('blog_role_pri as b','a.role_id','=','b.role_id')
                ->Join('blog_privilege as c','b.pri_id','=','c.id')
                ->where('admin_id',$admin_id)
                ->get();
            SC::setUserAccess($access->toArray());
            return redirect('admin');
        }
        return back()->withInput()->with('error','用户名或密码错误！');
    }

    /**
     * @name 退出登陆
     * @desc 退出登陆
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->loginServices->logout();
        return redirect('admin/login')->with('status','您已经安全退出！');
    }
}