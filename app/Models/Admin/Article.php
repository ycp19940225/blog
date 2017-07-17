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
    public $fillable = array('id','title','intro','content','created_at','updated_at','deleted_at','input_id','cat_id','views');


    /**
     * 关联模型
     * 属于该文章的分类。
     */
    public function cat()
    {
        return $this->belongsTo('App\Models\Admin\Cat','cat_id');
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
     * 关联模型
     * 属于该文章的作者
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Admin\Users','input_id');
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
        $this_article = $this->create($data);
        $tags=explode(',',$data['tags']);
        $tags_id = $this->getTagsID($tags);
        return $this_article->tag()->attach($tags_id);
    }

    /**
     * @name 修改文章
     * @desc 修改文章
     * @param $data
     * @return bool
     */
    public function updateArticle($data)
    {
        $tags=$this->getTagsID(explode(',',$data['tags']));
        $article = $this->find($data['id']);
        $article->tag()->sync($tags);
        return $article->update($data);
    }

    /**
     * @name 获取所有文章
     * @desc 获取所有文章
     * @return mixed
     */
    public function getAll()
    {
        return $this->where('deleted_at',0)->get();
    }

    /**
     * @name 根据标签获取id,没有就创建
     * @desc
     * @param $tags
     * @return array
     */
    public function getTagsID($tags): array
    {
        $tags_model = new Tag();
        $tags_id = [];
        if($tags[0]==''){
            return [];
        }
        foreach ($tags as $k => $v) {
            $tags_id[] = $tags_model->firstOrCreate(['name' => $v])->id;
        }
        return $tags_id;
    }
}