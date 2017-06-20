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
 * @name 利用反射获取权限树(路由)
 * @author [ycp] <[820363773@qq.com]>
 */
class Rbac
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


    /**
     * @name 获取系统所有权限
     * @desc
     * @return array
     */
   /* private function getAccess(){

        //1.获取所有控制器
        $modules = config('app.ACCESS_CHECK_MODULE');
        $modules = explode(',',$modules);
        $controllers =[];
        $pris = [];
        //获取基础控制器的方法
        $base_controller = config('app.name_space').'\\'.'Controller';
        $reflection = new ReflectionClass($base_controller);
        $class_desc = $reflection->getDocComment() ? $reflection->getDocComment(): '';   //类注释

        $action_base_names = $reflection->getMethods();
        $action_base_name=[];
        foreach ($action_base_names as $v){
            $action_base_name[]=$v->name;
        }
        //循环模块
        foreach ($modules as $mk=>$mv){
            //判断是否已经才在该模块
            $check_unique_module = $this->where([
                'module_name'=>$mv,
                'pri_name'=>$mv,
                'pri_desc'=>$mv,
                'parent_id' => 0
            ])->first();
            if(!$check_unique_module){
                //添加获取模块并获取ID
                $modules_id = $this->create(['module_name'=>$mv,'pri_name'=>$mv,'pri_desc'=>$mv])->id;
            } else{
                $modules_id = $check_unique_module->id;
            }
            $controllers = $this->getController($mv);
            if($controllers == null){
                continue;
            }
            //循环控制器
            foreach ($controllers as $con){
                $con_name = str_replace('Controller','',basename($con));
                $reflection2 = new ReflectionClass($con);
                //判断是否已经才在该控制器
                $check_unique_con = $this->where([
                    'module_name'=>$mv,
                    'pri_name'=>$mv,
                    'pri_desc'=>$class_desc,
                    'controller' =>$con_name,
                    'action_name' => ''
                ])->first();
                if(!$check_unique_con){
                    //添加控制器并获取控制器ID
                    $p_id = $this->create([
                        'module_name'=>$mv,
                        'pri_name'=>$mv,
                        'pri_desc'=>$class_desc,
                        'controller' =>$con_name,
                        'parent_id' =>$modules_id
                    ]);    //父类ID
                }else{
                    $p_id = $check_unique_con->id;
                }
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
                        $check_unique_method = $this->where( [
                                'module_name' =>$mv,
                                'controller' =>$con_name,
                                'action_name' =>$av_real]
                        )->first();
                        if(!$check_unique_method){
                            $this->create(
                                [
                                    'module_name' =>$mv,
                                    'controller' =>$con_name,
                                    'action_name' =>$av_real,
                                    'pri_name' =>$name,
                                    'pri_desc' =>$description,
                                    'parent_id' =>$p_id->id
                                ]
                            );
                        }

                    }
                }
            }
        }
        return true;
    }*/
    /**
     * 获取所有控制器名称 
     * @param string $module
     * @return array
     */
    /*protected function getController($module){

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
    }*/

}