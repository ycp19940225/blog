<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Base;
use Yajra\Datatables\Facades\Datatables;

class Users extends Base
{
    protected $table = 'blog_admin';
    protected $dateFormat = 'U' ;
    /**
     * 可以被集体赋值的表字段
     *
     * @var array
     */
    public $fillable = array('id','adminname','password','created_at','updated_at','input_id','token');

    /**
     * @name 添加后台用户
     * @desc 添加后台用户
     * @author ycp
     * @param Request $request
     * @return mixed
     */
    public function addUser(Request $request)
    {
        if(!$this->checkUnique($request->input('adminname'))){
            return $this->create($request->input());
        }else
            return false;

    }

    /**
     * @name 检测字段是否重复
     * @desc 检测字段是否重复
     * @author ycp
     * @param $field
     * @return bool
     */
    public function checkUnique($field)
    {
      return $field==$this->where('adminname',$field)->value('adminname');
    }

    /**
     * @name 获取表结构
     * @desc 获取表结构
     * @author ycp
     * @return mixed
     */
    public function getTables()
    {

      return Datatables::eloquent($this->query())
          ->make(true);
    }
}