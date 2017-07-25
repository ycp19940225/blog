<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Blog\User;
use App\Services\Admin\AdminLoginServicesImpl;
use App\Services\Admin\SC;
use App\Services\Ifs\Admin\AdminLoginServices;
use App\Services\Ifs\Admin\UserServices;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;
use Session;


class loginController extends controller
{
    protected $user;
    protected $loginServices;

    public function __construct(UserServices $userServices,AdminLoginServices $adminLoginServices)
    {
        $this->user=$userServices;
        $this->loginServices=$adminLoginServices;
    }

    public function index()
    {
        return view('blog.auth.login');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $driver
     * @return Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $driver
     * @return Response
     * @internal param Request $request
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $res = $this->doLogin($user);
        if($res){
            session()->put('blog_userInfo',$res->toArray());
            return redirect('blog')->with('status','登陆成功！');
        }
        return back()->withInput()->with('error','登陆失败！');
    }

    /**
     * @name 登陆操作
     * @desc 登陆操作
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogin($user)
    {
        $data['name'] = $user->nickname;
        $data['email'] = $user->email;
        $data['avatar_url'] = $user->avatar;
        $userModel = new User();
        return $userModel->firstOrCreate($data);
    }

    /**
     * @name 退出登陆
     * @desc 退出登陆
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        session()->forget('blog_userInfo');
        Session::flush();
        Session::regenerate();
        return redirect('blog')->with('status','您已经安全退出！');
    }
}