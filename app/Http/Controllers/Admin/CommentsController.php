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
        return view('admin.comments.index',[
            'title' => '评论首页',
            'data' => $data
        ]);
    }

    public function delete()
    {

    }
}