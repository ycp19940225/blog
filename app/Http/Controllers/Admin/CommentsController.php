<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/7/27
 * Time: 21:13
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\CommentsServices;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(CommentsServices $commentsServices)
    {
        $this->comments = $commentsServices;
    }
    /**
     * @name 评论首页
     * @desc
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->comments->getAll();
        foreach($data as $k=>$v){
            $data[$k]['comment_info']=json_decode($v['comment_info']);
        }
        return view('admin.comments.index',[
            'title' => '评论首页',
            'data' => $data
        ]);
    }

    public function delete(Request $request)
    {
        if($this->comments->delete($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }
}