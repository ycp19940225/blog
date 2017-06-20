<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Models\Admin;


use App\Models\Rbac;
use DB;
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
    public $fillable = array('id','pri_name','pri_desc','module_name','controller','action_name','parent_id','created_at','updated_at','deleted_at');


    /**
     * @name 获取所有权限
     * @desc 获取所有权限
     * @return mixed
     */
    public function getAll()
    {
        return $this->where('deleted_at',0)->select('id','pri_name','module_name','controller','action_name','created_at')->get();
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

    /**
     * @name 获取角色权限
     * @desc 获取角色权限
     * @param $role_id
     * @return array
     */
    public function getRolePris($role_id)
    {
        $list=[];
        //查询出此角色已经用用的权限
        $roleAccess = DB::table('blog_role_pri')
            ->where('role_id',$role_id)
            ->where('status',0)
            ->get();
        $access = $this->getAll();
        foreach ($access as $key => $val) {

            //修改选中状态
            foreach ($roleAccess as $k => $v) {
                if ($v->pri_id == $val['id']) {
                    $val['selected'] = 'selected="selected"';
                }
            }
            //如果不存在根节点
            if(empty($list[$val['module_name']])){
                //创建根节点
                $list['APP_'.$val['module_name']] = array(
                    'id' => 'APP_'.$val['module_name'],
                    'parent_id' => 0,
                    'pri_name' => 'APP_'.$val['module_name'],
                );
            }
            //如果不存在枝节点
            if(empty($list['m_'.$val['module_name'].'_'.$val['controller']])){
                //创建枝节点
                $list['m_'.$val['module_name'].'_'.$val['controller']] = array(
                    'id' => 'm_'.$val['module_name'].'_'.$val['controller'],
                    'parent_id' => 'APP_'.$val['module_name'],
                    'pri_name' => '模块_'.$val['controller'] ,
                    'selected' => 'selected="selected"',//默认选中
                );
            }
            //添加到展示项里
            $val['parent_id'] = 'm_'.$val['module_name'].'_'.$val['controller'];

            if(empty($val['selected'])){
                unset($list['m_'.$val['module_name'].'_'.$val['controller']]['selected']);
            }
            $list[] = $val;
        }
        return $list;
    }
}