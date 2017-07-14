<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Models\Admin;


use App\Services\Admin\SC;
use Illuminate\Http\Request;
use App\Models\Base;

class Tag extends Base
{
    protected $table = 'blog_tag';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','name','created_at','updated_at','deleted_at','input_id','views');


    /**
     * 关联模型
     * 属于该用户的权限。
     */
    public function pris()
    {
        return $this->belongsToMany('App\Models\Admin\Users','blog_role_pri','role_id','pri_id');
    }
}