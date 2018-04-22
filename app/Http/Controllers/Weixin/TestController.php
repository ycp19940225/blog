<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2018/4/22
 * Time: 21:07
 */

namespace App\Http\Controllers\Weixin;

/**
 * wechat php test
 */

//define your token
define("TOKEN", "ycp");


class TestController
{
    protected static $appId = 'wxeca0cc6f1e4f94da';
    protected static $token = 'ycp';
    protected static $AppSecret = '7acfe4156a8624a393cfc246fd0ef0a0';
    protected $access_token;

    public function __construct()
    {
        self::set_interval();
        $this->access_token = self::read_token();
    }
    public function test()
    {
        echo $this->access_token;

    }

    //获取access_token并保存到token.txt文件中
    public static function build_access_token(){
        $ch = curl_init(); //初始化一个CURL对象
        curl_setopt($ch, CURLOPT_URL, 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.self::$appId.'&secret='.self::$AppSecret);//设置你所需要抓取的URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置curl参数，要求结果是否输出到屏幕上，为true的时候是不返回到网页中,假设上面的0换成1的话，那么接下来的$data就需要echo一下。
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//跳过证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        $data = json_decode(curl_exec($ch));
        if($data->access_token){
            $token_file = fopen("token.txt","w") or die("Unable to open file!");//打开token.txt文件，没有会新建
            fwrite($token_file,$data->access_token);//重写tken.txt全部内容
            fclose($token_file);//关闭文件流
        }else{
            echo $data->errmsg;
        }
        curl_close($ch);
    }

    //设置定时器，每两小时执行一次build_access_token()函数获取一次access_token
    public static function set_interval(){
        ignore_user_abort();//关闭浏览器仍然执行
        set_time_limit(0);//让程序一直执行下去
        $interval = 7200;//每隔一定时间运行
        do{
            self::build_access_token();
            sleep($interval);//等待时间，进行下一次操作。
        }while(true);
    }

    //读取token
    public static function read_token(){
        $token_file = fopen("token.txt", "r") or die("Unable to open file!");
        $rs = fgets($token_file);
        fclose($token_file);
        return $rs;
    }
}

