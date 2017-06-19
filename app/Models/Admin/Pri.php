<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Base;
use ReflectionClass;
use Yajra\Datatables\Facades\Datatables;

class Pri extends Base
{
    protected $table = 'blog_privilege';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','pri_name','pri_desc','module_name','controller','action_name','parent_id','created_at','updated_at','deleted_at');
    /**
     * 关联模型
     * 属于该用户的身份。
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role','admin_role','pri_id','role_id');
    }

    /**
     * @name 获取所有权限
     * @desc 获取所有权限
     * @return mixed
     */
    public function getAll()
    {
        return $this->where('deleted_at',0)->select('id','pri_name','module_name','controller','action_name','parent_id','created_at')->get();
    }
    /**
     * @name 系统权限添加入库
     * @desc 系统权限添加入库
     * @return mixed
     */
    public function addAppPri()
    {
        return  $this->getAccess();
    }




    /**
     * @name 检测字段是否重复
     * @desc 检测字段是否重复
     * @param $field
     * @param string $id
     * @return bool
     */
    public function checkUnique($field, $id='')
    {
        if(!empty($id)){
            $data = $this->where('id','!=',$id)->get();
            foreach ($data as $k=>$v){
                if($v['role_name'] == $field){
                    return true;
                }
            }
        }else
            return $field==$this->where(['role_name'=>$field])->value('role_name') ;
    }


    /**
     * @name 修改信息
     * @desc 修改信息
     * @param $data
     * @return bool
     */
    public function updateRole($data)
    {
        return $this->find($data['id'])->update($data);
    }


    /**
     * @name 获取系统所有权限
     * @desc
     * @return array
     */
    private function getAccess(){
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
            //添加获取模块并获取ID
            $modules_id = $this->create(['module_name'=>$mv,'pri_name'=>$mv,'pri_desc'=>$mv])->id;
            $controllers = $this->getController($mv);
            if($controllers == null){
                continue;
            }
            //循环控制器
            foreach ($controllers as $con){
                $con_name = str_replace('Controller','',basename($con));
                $reflection2 = new ReflectionClass($con);
                //添加控制器并获取控制器ID
                $p_id = $this->create([
                    'module_name'=>$mv,
                    'pri_name'=>$mv,
                    'pri_desc'=>$class_desc,
                    'controller' =>$con_name,
                    'parent_id' =>$modules_id
                ]);    //父类ID
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
    }
    /**
     * 获取所有控制器名称 
     * @param string $module
     * @return array
     */
    protected function getController($module){

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