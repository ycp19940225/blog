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
use Yajra\Datatables\Facades\Datatables;

class Pri extends Base
{
    protected $table = 'blog_privilege';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','pri_name','module_name','controller','action_name','parent_id','created_at','updated_at','deleted_at');
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
        //1.获取所有控制器
        $root_dir = app_path('Http\Controllers');
        $this->getController();
    }

    /**
     * 获取所有控制器名称 
     * @param string $module
     * @return array
     */
    protected function getController($module='Admin'){

        if(empty($module)){
            return ['o'=>'0'];
        }
        $module_path = app_path().'/'.$module.'/Controllers/';//控制器路径 

        if(!is_dir($module_path)) {
            return ['o'=>'0'];
        };
        $module_path .= '/*Controller.php';

        $ary_files = glob($module_path);
        var_dump($ary_files);exit();
        foreach ($ary_files as $file){
            if(is_dir($file)){
                continue;
            }else{
                $files[]=basename($file,C('DEFAULT_C_LAYER').'.class.php');
            }
        }
        return $files;
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


}