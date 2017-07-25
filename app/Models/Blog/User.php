<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Models\Blog;


use App\Models\Base;

class User extends Base
{
    protected $table = 'blog_users';
    protected $dateFormat = 'U';

    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','name','password','email','avatar_url','created_at','updated_at','remember_token');


}