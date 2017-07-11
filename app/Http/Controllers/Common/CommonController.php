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
use App\Services\Common\UploadServicesImpl;
use App\Services\Ifs\Admin\RoleServices;
use App\Services\Ifs\Admin\UserServices;
use Illuminate\Http\Request;
use YuanChao\Editor\EndaEditor;

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

    /**
     * @name 头像修改页面
     * @desc
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadLogo()
    {
        return view('admin.user.user_logo',['title'=>'修改头像','data'=>SC::getLoginSession()->logo]);
    }

    /**
     * @name 上传头像
     * @desc 本地或者七牛可自由切换
     * @param Request $request
     * @param UploadServicesImpl $uploadServicesImpl
     * @return mixed
     */
    public function upLogo(Request $request, UploadServicesImpl $uploadServicesImpl)
    {
        $img_path = $uploadServicesImpl->uploadImg($request->file('logo'));
        if($this->user->updateUser(['id'=>SC::getLoginSession()->id,'logo'=>$img_path])){
            return redirect('/admin')->with('status','修改成功！');
        }
        return back()->withInput()->with('error','修改失败！');

    }

    /**
     * @name 上传博客图片
     * @desc 上传博客图片
     * @return string
     */
    public function upBlogImg()
    {
        // path 为 public 下面目录，比如我的图片上传到 public/uploads 那么这个参数你传uploads 就行了

        $data = EndaEditor::uploadImgFile('uploads');

        return json_encode($data);
    }

}