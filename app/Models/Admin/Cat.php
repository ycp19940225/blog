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

class Cat extends Base
{
    protected $table = 'blog_category';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','name','intro','created_at','updated_at','deleted_at','input_id','views');


    /**
     * 关联模型
     * 属于该分类的文章。
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Admin\Article','cat_id','id');
    }

    public function getArticleByCatID($id,$limit ='')
    {

    }
}