<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/7/27
 * Time: 21:25
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'blog_comments';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','content','user_id','article_id','comment_info','parent_id','created_at','updated_at','deleted_at');

    /**
     * 关联模型
     * 评论属于的文章
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Admin\Article','article_id');
    }

    public function getByArticle($article_id)
    {
           $data =  $this->where('article_id',$article_id)
            ->where('deleted_at',0)
            ->where('reviewed',1)
            ->orderBy('created_at','desc')
            ->get();
           return $this->get_tree($data->toArray());
    }

    public function get_tree($data)
    {
        return $this->_reSort($data);
    }
    private function _reSort($data, $parent_id=0, $level=0, $isClear=TRUE)
    {
        static $ret = array();
        if($isClear)
            $ret = array();
        foreach ($data as $k => $v)
        {
            if($v['parent_id'] == $parent_id)
            {
                $v['level'] = $level;
                $ret[] = $v;
                $this->_reSort($data, $v['id'], $level+1, FALSE);
            }
        }
        return $ret;
    }
    public function getChildren($id)
    {
        $data = $this->where('deleted_at',0)
            ->where('reviewed',1)
            ->orderBy('created_at','desc')
            ->get();
        return $this->_children($data, $id);
    }

    private function _children($data, $parent_id=0, $isClear=TRUE)
    {
        static $ret = array();
        if($isClear)
            $ret = array();
        foreach ($data as $k => $v)
        {
            if($v['parent_id'] == $parent_id)
            {
                $ret[] = $v['id'];
                $this->_children($data, $v['id'], FALSE);
            }
        }
        return $ret;
    }
}