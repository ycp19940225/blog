<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2018/4/22
 * Time: 21:07
 */

namespace App\Http\Controllers\Weixin;



class TestController
{
    protected static $appId = 'wxeca0cc6f1e4f94da';
    protected static $token = 'ycp';
    protected static $AppSecret = '7acfe4156a8624a393cfc246fd0ef0a0';
    protected $access_token;

    public function __construct()
    {
        $this->access_token = self::read_token();
    }
    public function test()
    {
        $data = '{
    "button": [
        {
            "name": "扫码", 
            "sub_button": [
                {
                    "type": "scancode_waitmsg", 
                    "name": "扫码带提示", 
                    "key": "rselfmenu_0_0", 
                    "sub_button": [ ]
                }, 
                {
                    "type": "scancode_push", 
                    "name": "扫码推事件", 
                    "key": "rselfmenu_0_1", 
                    "sub_button": [ ]
                }
            ]
        }, 
        {
            "name": "发图", 
            "sub_button": [
                {
                    "type": "pic_sysphoto", 
                    "name": "系统拍照发图", 
                    "key": "rselfmenu_1_0", 
                   "sub_button": [ ]
                 }, 
                {
                    "type": "pic_photo_or_album", 
                    "name": "拍照或者相册发图", 
                    "key": "rselfmenu_1_1", 
                    "sub_button": [ ]
                }, 
                {
                    "type": "pic_weixin", 
                    "name": "微信相册发图", 
                    "key": "rselfmenu_1_2", 
                    "sub_button": [ ]
                }
            ]
        }, 
        {
            "name": "发送位置", 
            "type": "location_select", 
            "key": "rselfmenu_2_0"
        },
        {
           "type": "media_id", 
           "name": "图片", 
           "media_id": "MEDIA_ID1"
        }, 
        {
           "type": "view_limited", 
           "name": "图文消息", 
           "media_id": "MEDIA_ID2"
        }
    ]
}';
        $urls = ' https://api.weixin.qq.com/cgi-bin/menu/create?access_token'.$this->access_token;
        $res = $this->send($urls,'post',$data);





    }
    //读取token
    public static function read_token(){
        $token_file = fopen("token.txt", "r") or die("Unable to open file!");
        $rs = fgets($token_file);
        fclose($token_file);
        return $rs;
    }

    public function send($url,$type='get',$data)
    {
        $ch = curl_init(); //初始化一个CURL对象
        curl_setopt($ch, CURLOPT_URL,$url);//设置你所需要抓取的URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置curl参数，要求结果是否输出到屏幕上，为true的时候是不返回到网页中,假设上面的0换成1的话，那么接下来的$data就需要echo一下。
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//跳过证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        if($type == 'post'){
            curl_setopt($ch, CURLOPT_POST, 1); // 发送一个常规的Post请求
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        }
        $data = json_decode(curl_exec($ch));
        curl_close($ch);
        return $data;
    }
}

