<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/7/27
 * Time: 21:11
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\CommentsServices;
use DB;

class CommentsController extends Controller
{

    /**
     * @name 获取评论
     * @desc
     * @author ycp
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments($id)
    {
        $data =  DB::table('blog_comments')
            ->where('article_id',$id)
            ->where('deleted_at',0)
            ->where('reviewed',1)
            ->get();
        return response()->json(msg('success','获取成功!',['data'=>$data]));
    }

    public function doComments()
    {

    }
}