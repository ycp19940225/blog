<?php
/**
 * @name:
 * @desc:
 * Author: ycp
 * Date: 2017/6/14
 * Time: 10:35
 * Created by PhpStorm.
 */

namespace App\Models;
use ReflectionClass;

/**
 * @name 利用反射获取权限树(控制器-方法)
 * @author [ycp] <[820363773@qq.com]>
 */
class Rbac1
{
    public function getAccess(){

        //1.获取所有控制器
        $modules = config('app.ACCESS_CHECK_MODULE');
        $modules = explode(',',$modules);
        $controllers =[];
        $pris = [];
        //获取基础控制器的方法
        $base_controller = config('app.name_space').'\\'.'Controller';
        $reflection = new ReflectionClass($base_controller);
        $action_base_names = $reflection->getMethods();
        $action_base_name=[];
        foreach ($action_base_names as $v){
            $action_base_name[]=$v->name;
        }
        //循环模块
        foreach ($modules as $mk=>$mv){
            $controllers = $this->getController($mv);
            if($controllers == null){
                continue;
            }
            //循环控制器
            foreach ($controllers as $con){
                $con_name = str_replace('Controller','',basename($con));
                $reflection2 = new ReflectionClass($con);
                $action_names = $reflection2->getMethods();
                //循环方法
                foreach ($action_names as $ak=>$av){
                    $av_real = $av->name;
                    $desc = $av->getDocComment();
                    //控制器名称
                    if (!preg_match('/@name\s+(\w+)/u', $desc, $catch)) continue;

                    $name = $catch[1];
                    //控制器描述
                    $description = preg_match('/@desc\s+(\w+)/u', $desc, $catch)
                        ? $catch[1]
                        : '';

                    if(in_array($av_real,$action_base_name) || $av_real == '__construct'){
                        continue;
                    }else{
                        $pris[] = [
                            'module_name' =>$mv,
                            'controller' =>$con_name,
                            'action_name' =>$av_real,
                            'pri_name' =>$name,
                            'pri_desc' =>$description
                        ];
                    }
                }
            }

        }
        return $pris;
    }
    /**
     * 获取所有控制器名称 
     * @param string $module
     * @return array
     */
    protected function getController($module='Admin'){

        if(empty($module)){
            return null;
        }
        $module_path = app_path('Http\Controllers').'/'.$module;//控制器路径 
        $module_path = str_replace('\\','/',$module_path);
//        var_dump($module_path);exit();

        if(!is_dir($module_path)) {
            return null;
        };
        $module_path .= '/*.php';

        $ary_files = glob($module_path);
//        var_dump($ary_files);exit();
        $files= [];
        foreach ($ary_files as $file){
            if(is_dir($file)){
                continue;
            }else{
                $files[]=config('app.name_space').'\\'.$module.'\\'.basename($file,'.php');
            }
        }
        return $files;
    }
}