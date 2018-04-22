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
        /*$data =file_get_contents('menu.json');

        $urls = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token'.$this->access_token;
        $res = $this->send($urls,'post',$data);
        dd($res);*/
        echo $this->access_token;



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
        curl_setopt($ch, CURLOPT_HEADER, 0);
        if($type == 'post'){
            curl_setopt($ch, CURLOPT_POST, 1); // 发送一个常规的Post请求
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}

