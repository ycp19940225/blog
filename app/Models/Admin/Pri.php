<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Models\Admin;


use App\Models\Rbac;
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
    public function refreshPri()
    {
        $rbac = new Rbac();
        $pris = $rbac->getAccess();
        $ids = [] ; //更新或者添加的ID
        foreach ($pris as $k=>$v){
            //添加或者更新已有权限
            $pri = $this->updateOrCreate([
                'module_name' =>$v['module_name'],
                'controller' =>$v['controller'],
                'action_name' =>$v['action_name']
            ],[
                'pri_name' =>$v['pri_name'],
                'pri_desc' =>$v['pri_desc']
            ]);
            $ids[] = $pri->id;
        }
        //去掉删除的权限
        $old_ids = json_decode($this->pluck('id'),true);
        $delete_ids = array_diff($old_ids,$ids);
        foreach ($delete_ids as $v){
            $this->destroy($v);
        }
        return true;
    }
}