<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/7/27
 * Time: 21:11
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Admin\Comments;
use App\Services\Ifs\Admin\CommentsServices;
use Auth;
use DB;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(CommentsServices $commentsServices)
    {
        $this->comments = $commentsServices;
    }
    /**
     * @name 获取评论
     * @desc
     * @author ycp
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments(Request $request)
    {
        $data =  $this->comments->getByArticle($request->input('article_id'));
        return response()->json(msg('success','获取成功!',['data'=>$data]));
    }

    public function doComments(Request $request)
    {
        $data = $request->input();
        $res = $this->comments->save($data);


        if($res){
            return response()->json(msg('success','评论成功!',['data'=>$res]));
        }
        return response()->json(msg('success','评论失败!'));
    }
}