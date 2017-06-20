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

class Role extends Base
{
    protected $table = 'blog_role';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','role_name','created_at','updated_at','input_id','deleted');
    /**
     * 关联模型
     * 属于该用户的权限。
     */
    public function pris()
    {
        return $this->belongsToMany('App\Models\Admin\Users','blog_role_pri','role_id','pri_id');
    }

    /**
     * @name 添加后台用户
     * @desc 添加后台用户
     * @author ycp
     * @param Request $request
     * @return mixed
     */
    public function addRole(Request $request)
    {
        return $this->create($request->input());
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
     * @name 获取所有角色
     * @desc 获取所有角色
     * @return mixed
     */
    public function getAll()
    {
        return $this->where('deleted_at',0)->select('id','role_name','created_at','updated_at')->get();
    }

    /**
     * @name 更新角色权限
     * @desc 更新角色权限
     * @param $data
     */
    public function updateRolePri($data)
    {
        $role = $this->find($data['id']);
        $pris_id = [];
        if(isset($data['access'])){
            foreach ($data['access'] as $v){
                if(is_numeric($v)){
                    $pris_id[]=$v;
                }
            }
        }
        return $role->pris()->sync($pris_id);
    }
}