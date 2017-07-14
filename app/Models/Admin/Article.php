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

class Article extends Base
{
    protected $table = 'blog_article';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','title','intro','content','created_at','updated_at','deleted_at','input_id','tag_id','views');


    /**
     * 关联模型
     * 属于该文章的分类。
     */
    public function cat()
    {
        return $this->belongsTo('App\Models\Admin\Cat');
    }
    /**
     * 关联模型
     * 属于该文章的标签
     */
    public function tag()
    {
        return $this->belongsToMany('App\Models\Admin\Tag','blog_tag_article','article_id','tag_id');
    }

    /**
     * @name 添加文章
     * @desc 添加文章
     * @author ycp
     * @param Request $request
     * @return mixed
     */
    public function addArticle(Request $request)
    {
        $data = $request->input();
        $data['input_id'] = SC::getLoginSession()->id;
        return $this->create($data);
    }

    /**
     * @name 修改文章
     * @desc 修改文章
     * @param $data
     * @return bool
     */
    public function updateArticle($data)
    {
        return $this->find($data['id'])->update($data);
    }

    /**
     * @name 获取所有文章
     * @desc 获取所有文章
     * @return mixed
     */
    public function getAll()
    {
        return $this->where('deleted_at',0)->select('id','title','created_at','updated_at')->get();
    }
}