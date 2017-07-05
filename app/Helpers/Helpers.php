<?php
/**
 * 加载静态资源
 *
 * @param string $file 所要加载的资源
 */
use App\Services\Admin\SC;

if ( ! function_exists('loadStatic'))
{
    function loadStatic($file)
    {
        if( ! $file) return Request::root().'/assets/';
        $realFile = public_path().'/assets/'.$file;
        if( ! file_exists($realFile)) return '';
        $filemtime = filemtime($realFile);
        return Request::root().'/assets/'.$file.'?v='.$filemtime;
    }
}
/**
 * 自定义加密函数
 *
 * @param string $file 所要加载的资源
 */
if ( ! function_exists('get_md5_password'))
{
    function get_md5_password($password)
    {
        if ($password) {
            return md5($password.sha1($password).$password);
        }else{
            return '';
        }
    }
}
/**
 * 自定义消息数组
 *
 */
if ( ! function_exists('msg'))
{
    function msg($code = 200,$msg='',$array = [])
    {
       return ['code' =>$code,'msg'=>$msg,'data'=>$array];
    }
}
/**
 * 检测用户拥有的角色
 */
if ( ! function_exists('check_roles'))
{
    function check_roles($roles,$user)
    {
        foreach ($roles as $k=>$v){
            foreach ($user->roles as $role){
                if($v['id'] == $role->id){
                    $roles[$k]['checked'] = 'checked';
                    break;
                }else{
                    $roles[$k]['checked'] = '';
                }
            }
        }
        return $roles;
    }
}
/**
 * 获取用户信息
 */
if ( ! function_exists('get_user'))
{
    function get_user()
    {
       return SC::getLoginSession();
    }
}
/**
 * 检测权限
 */
if ( ! function_exists('checkPri')){
    function checkPri($url){
        if($url == 'admin'){//首页不验证
            return false;
        }
        $pris = SC::getUserAccess();
        if(count($pris)>0){
            if(!is_array($url)){
                $url = explode('/',$url);
            }
            foreach ($pris as $pri){
                if($pri->admin_id ===1){
                    return false;
                }
                if(strtolower($url[0]) == strtolower($pri->module_name) && strtolower($url[1]) == strtolower($pri->controller) && strtolower($url[2]) == strtolower($pri->action_name)){
                    return false;
                }
            }
        }
        return true;
    }
}

