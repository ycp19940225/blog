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
        $this->access_token = self::read_token();
    }
    public function test()
    {
        echo $this->access_token;

    }
    //读取token
    public static function read_token(){
        $token_file = fopen("token.txt", "r") or die("Unable to open file!");
        $rs = fgets($token_file);
        fclose($token_file);
        return $rs;
    }
}

