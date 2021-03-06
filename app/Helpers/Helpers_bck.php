<?php
/**
 * 返回json
 *
 * @param string $msg 返回的消息
 * @param boolean $status 是否成功
 */
if( ! function_exists('responseJson'))
{
    function responseJson($msg, $status = false, $extend = array())
    {
        $status = $status ? 'success' : 'error';
        $arr = array('result' => $status, 'message' => $msg);
        if(is_array($extend) && count($extend)) {
            $arr = array_merge($arr, $extend);
        }
        return Response::json($arr);
    }
}

/**
 * 时间人性化
 *
 * @param int $time 写作的时间
 * @return string
 */
if( ! function_exists('showWriteTime'))
{
    function showWriteTime($time)
    {
        $interval = time() - $time;
        $format = array(
            '31536000'  => '年',
            '2592000'   => '个月',
            '604800'    => '星期',
            '86400'     => '天',
            '3600'      => '小时',
            '60'        => '分钟',
            '1'         => '秒'
        );
        foreach($format as $key => $value)
        {
            $match = floor($interval / (int) $key );
            if(0 != $match)
            {
                return $match . $value . '前';
            }
        }
        return date('Y-m-d', $time);
    }
}

/**
 * 根据时间戳获取星期几
 */
if ( ! function_exists('getTimeWeek'))
{
    function getTimeWeek($time, $i = 0) {
        $weekarray = array("日","一", "二", "三", "四", "五", "六");
        $oneD = 24 * 60 * 60;
        try{
            return "周" . $weekarray[date("w", $time + $oneD * $i)];
        }catch (Exception $e){
            return $time;
        }

    }
}

/**
 * 二维数组的排序
 *
 * @param array $arr 所要排序的数组
 * @param string $keys 以哪个key来做排序
 * @param string $type desc|asc
 */
if ( ! function_exists('arraySort'))
{
    function arraySort($arr, $keys, $type='asc')
    {
        $keysvalue = $new_array = array();
        foreach ($arr as $k=>$v)
        {
            $keysvalue[$k] = $v[$keys];
        }
        if($type == 'asc')
        {
            asort($keysvalue);
        }
        else
        {
            arsort($keysvalue);
        }
        reset($keysvalue);
        foreach($keysvalue as $k=>$v)
        {
            $new_array[$k] = $arr[$k];
        }
        $arr = array();
        foreach($new_array as $key => $val)
        {
            $arr[] = $val;
        }
        return $arr;
    }
}

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
 * 加载静态资源(图片)
 *
 * @param string $file 所要加载的资源
 */
if ( ! function_exists('loadStaticImg'))
{
    function loadStaticImg($file)
    {
        if( ! $file) return Request::root().'/assets/';
        $realFile = public_path().'/assets/'.$file;
        if( ! file_exists($realFile)) return '';
        return Request::root().'/assets/'.$file;
    }
}

/**
 * 加载上传文件
 *
 * @param string $file 所要加载的资源
 */
if ( ! function_exists('loadUploadFile'))
{
    function loadUploadFile($file)
    {
        if( ! $file) return Request::root().'/assets/home/images/nodata.jpg';
        $realFile = public_path().'/'.$file;
        if( ! file_exists($realFile)) return '';
        return Request::root().'/'.$file;
    }
}

/**
 * 显示验证码
 */
if ( ! function_exists('captcha'))
{
    function captcha()
    {
        return route('verify.captcha');
    }
}

/**
 * 适用于url的base64加密
 */
if( ! function_exists('base64url_encode') )
{
    function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

/**
 * 适用于url的base64解密
 */
if( ! function_exists('base64url_decode') )
{
    function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}

/**
 * 转化 \ 为 /
 *
 * @param    string  $path   路径
 * @return   string  路径
 */
if( ! function_exists('dir_path') )
{
    function dir_path($path)
    {
        $path = str_replace('\\', '/', $path);
        if(substr($path, -1) != '/') $path = $path.'/';
        return $path;
    }

}

/**
 * 创建目录
 *
 * @param    string  $path   路径
 * @param    string  $mode   属性
 * @return   string  如果已经存在则返回true，否则为flase
 */
if( ! function_exists('dir_create') )
{
    function dir_create($path, $mode = 0777)
    {
        if(is_dir($path)) return TRUE;
        $ftp_enable = 0;
        $path = dir_path($path);
        $temp = explode('/', $path);
        $cur_dir = '';
        $max = count($temp) - 1;
        for($i=0; $i<$max; $i++)
        {
            $cur_dir .= $temp[$i].'/';
            if (@is_dir($cur_dir)) continue;
            @mkdir($cur_dir, 0777,true);
            @chmod($cur_dir, 0777);
        }
        return is_dir($path);
    }
}

/**
 * 根据后缀来简单的判断是不是图片
 *
 * @return boolean
 */
if( ! function_exists('isImage') )
{
    function isImage($ext)
    {
        $imageExt = 'jpg|gif|png|bmp|jpeg';
        if( ! in_array($ext, explode('|', $imageExt))) return false;
        return true;
    }
}

/**
 * 加密函数
 *
 * @param string $string 所要加密的字符
 */
if( ! function_exists('encrypt'))
{
    function encrypt($string)
    {
        return Crypt::encrypt($string);
    }
}

/**
 * 解密函数
 *
 * @param string $string 加密过的字符
 */
if( ! function_exists('decrypt'))
{
    function decrypt($string)
    {
        return Crypt::decrypt($string);
    }
}

/**
 * 主要用于url参数的加密
 *
 * @param string $string 所要加密的字符
 */
if( ! function_exists('url_param_encode'))
{
    function url_param_encode($string)
    {
        return encrypt(base64url_encode($string));
    }
}

/**
 * 主要用于url参数的解密
 *
 * @param string $string 所要解密的字符
 */
if( ! function_exists('url_param_decode'))
{
    function url_param_decode($string)
    {
        return decrypt(base64url_decode($string));
    }
}

/**
 * 主要用于防止表单篡改
 *
 * @param void $data 所要验证的数据，必须以最后提交的数据的数据结构一致。
 */
if( ! function_exists('form_hash'))
{
    function form_hash($data)
    {
        return (new Uobatu\Services\FormHashService())->hash($data);
    }
}

/**
 * 显示操作提示信息(常规显示)
 *
 * @param string $content 提示信息
 * @param string or array $url 要跳转的链接,可以为空,字符串,数组
 * @param int $time 页面停留时间(毫秒)
 * @param bool $is_show 是否显示操作内容
 */
if( ! function_exists('message'))
{
    function message($content, $url = '', $is_show = true, $time = 3000)
    {
        return view('admin.msg', ['content'=>$content, 'url'=>$url, 'time'=>$time, 'is_show'=>$is_show]);
    }
}

if( ! function_exists('showMessage'))
{
    function showMessage($content, $url = '', $is_show = true, $time = 3000)
    {
        return view('website.message.message', ['nav_sian'=>'index', 'content'=>$content, 'url'=>$url, 'time'=>$time, 'is_show'=>$is_show]);
    }
}

/**
 * 显示操作提示信息(顶部提示)
 *
 * @param string $content 提示信息
 */
if( ! function_exists('feedback'))
{
    function feedback($content, $type = 1)
    {
        $feedback = \Uobatu\Services\Common\Feedback::getInstance();

        switch($type) {
            case 1:
                $feedback->info($content);
                break;
            case 2:
                $feedback->error($content);
                break;
            case 3:
                $feedback->warning($content);
                break;
            default:
                $feedback->info($content);
                break;
        }
        return true;
    }
}

/**
 * 显示操作提示信息(模版使用)
 *
 * @param string $content 提示信息
 */
if( ! function_exists('feedbackHandder'))
{
    function feedbackHandder()
    {
        $feedback = \Uobatu\Services\Common\Feedback::getInstance();
        $messages = $feedback->getFeedback();

        $info = $messages['info'];
        $error = $messages['error'];
        $warning = $messages['warning'];

        if(is_array($info)) {
            foreach($info as $val) {
                echo '<script>$(function(){ $.feedback(\''.$val.'\', \'info\') })</script>';
            }
        }
        if(is_array($error)) {
            foreach($error as $val) {
                echo '<script>$(function(){ $.feedback(\''.$val.'\', \'error\') })</script>';
            }
        }
        if(is_array($warning)) {
            foreach($warning as $val) {
                echo '<script>$(function(){ $.feedback(\''.$val.'\', \'warning\') })</script>';
            }
        }
    }
}

if(!function_exists('changeToJson')){
    /**
     * g功能：将发生变更说的数据转换为中午的json字符串
     * @param $diff  变更的数据
     * @param array $fillableCn 变更字段对应的中文解释
     * @return json 返回json字符串
     */
    function changeToJson($diff,array $fillableCn){
        $diffArr = explode('&',$diff);
        $jsonDiff = array();
        foreach ($diffArr as $value){
            $diffVal = explode('=',$value);
            if(isset($fillableCn[$diffVal[0]])){
                $jsonDiff[$fillableCn[$diffVal[0]]] = urldecode(urldecode($diffVal[1]));
            }
        }
        return json_encode($jsonDiff,JSON_UNESCAPED_UNICODE);
    }
}
if(!function_exists('requestToModal')) {
    function requestToModal(\Illuminate\Http\Request $request,array $modelFile,$primaryKey){
        $data = array();
        $requestArr = $request->all();
        foreach ($modelFile as $value){
            if(isset($requestArr[$value])&&$primaryKey!=$value){
                $data[$value] = $request->input($value);
            }
        }
        return $data;
    }
}
if(!function_exists('arrayToModal')) {
    function arrayToModal(array $source,array $modelFile,$primaryKey){
        $data = array();
        foreach ($modelFile as $value){
            if(isset($source[$value])&&$primaryKey!=$value){
                $data[$value] = $source[$value];
            }
        }
        return $data;
    }
}

if(!function_exists('hasChild')) {
    function hasChild(array $menus,$menuId){
        $flag = false;
        foreach ($menus as $menu){
            if($menu->PARENT_ID==$menuId){
                $flag = true;
                break;
            }
        }
        return $flag;
    }
}
/**
 * 功能：判断是否有权限信息
 * @param $menuId 菜单id
 * @param $operateName 具体操作code
 */
if(!function_exists('isPermission')) {
    function isPermission($menuId,$code){
        $permission = \Uobatu\Services\Admin\SC::getUserPermissionSession();
        if(isset($permission[$menuId])){
            return strstr($permission[$menuId]->FUNCTIONS,$code);
        }
        return false;
    }
}
/**
 * 功能：10进制时间格式
 * @param $menuId 菜单id
 * @param $operateName 具体操作code
 */
if(!function_exists('formatIntTime')) {
    function formatIntTime($time){
        if($time<=0){
            return '';
        }
        return date('Y-m-d H:i:s',$time);
    }
}
/**
 * 功能：生成订单流水号
 * @param $prefix 前缀
 */
if(!function_exists('createOrderNo')) {
    function createOrderNo($prefix){
        $order_id_main = date('YmdHis').rand(100,999);
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;
        for($i=0; $i<$order_id_len; $i++){
            $order_id_sum += (int)(substr($order_id_main,$i,1));
        }
        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        return $prefix.$order_id_main.str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
    }
}
/**
 * 功能：发送短信
 * @param $mobile 手机号
 * @param $content 短信内容
 */
if(!function_exists('sendSMS')) {
    function sendSMS($mobile,$content){
        $sms = new Uobatu\Api\Sms\Sms();
        $reslut = $sms->send($mobile, $content);
        return $reslut;
    }
}

/**
 * 第三方在线支付接口
 *
 */
if(!function_exists('_api_pay')) {
    function _api_pay($payment_info, $order_info, $order_type) {
        if($payment_info->PAYMENT_CODE == 'alipay') {
            $payment_api = new alipay($payment_info, $order_info, $order_type);

            @header("Location: ".$payment_api->get_payurl());
        } else if($payment_info->PAYMENT_CODE == 'wxpay') {

        }
    }
}