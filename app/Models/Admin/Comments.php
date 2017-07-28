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

}