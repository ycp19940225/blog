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
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     *
     * @var array
     */
    public $fillable = array('id','adminname','password','email','created_at','updated_at','input_id','token');

    /**
     * @param $data
     * @param string $method
     * @return
     * @internal param $处理数据
     * @desc 处理数据
     */
    public function processingData($data,$method =''){
        switch ($method){
            case 'add':  $data['password'] = get_md5_password($data['password']) ;
                break;
            default:break;
        }
        return $data;
    }
    /**
     * @name 添加后台用户
     * @desc 添加后台用户
     * @author ycp
     * @param Request $request
     * @return mixed
     */
    public function addUser(Request $request)
    {
        if($this->checkUnique($request->input('adminname'))){
            $data = $this->processingData($request->input(),'add');
            return $this->create($data);
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
      return $field==$this->where('adminname',$field)->value('adminname') ? false:true;
    }

    /**
     * @name 获取信息
     * @desc 获取表结构
     * @author ycp
     * @return mixed
     */
    public function getTables()
    {
       return Datatables::eloquent($this::select('id','adminname','updated_at','created_at'))
            ->make(true);
    }
}