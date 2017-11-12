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
use Jenssegers\Date\Date;
use Laravel\Scout\Searchable;
use Symfony\Component\VarDumper\Cloner\Data;

class Article extends Base
{
    use Searchable;
    protected $table = 'blog_article';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','title','intro','content','created_at','updated_at','deleted_at','input_id','cat_id','views');


    /**
     * 得到该模型索引的名称。
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'articles_index';
    }

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
     * 关联模型
     * 属于该文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Admin\Comments','article_id');
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
        $this_article->tag()->attach($tags_id);
        return $this_article;
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
        return $this->where('deleted_at',0)->orderBy('updated_at','desc')->get();
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


    /**
     * @name 文章分类列表
     * @desc
     * @param string $year
     * @param string $month
     * @param string $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getArchives($year = '', $month ='', $paginate= '')
    {

        $start = Date::parse($year.$month)->timestamp;
        $end = Date::parse($year.$month)->addMonth()->subSecond()->timestamp;
        return $this
            ->whereBetween('created_at',[$start,$end])
            ->where('deleted_at',0)
            ->orderBy('updated_at','desc')
            ->paginate($paginate);
    }

    /**
     * @name 文章分类类目
     * @desc
     * @return \Illuminate\Support\Collection
     */
    public static function archives()
    {
        return static::
        selectRaw('year(FROM_UNIXTIME(created_at))  year, monthname(FROM_UNIXTIME(created_at)) month, count(*) published')
        ->where('deleted_at',0)
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get();
    }
}