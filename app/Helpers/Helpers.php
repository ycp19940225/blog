<?php
/**
 * 加载静态资源
 *
 * @param string $file 所要加载的资源
 */
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

