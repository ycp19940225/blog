<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Admin\Article;
use App\Services\Ifs\Admin\ArticleServices;
use Illuminate\Http\Request;
use YuanChao\Editor\EndaEditor;


class SearchController extends controller
{


    protected $articles;

    public function __construct(ArticleServices $articleServices)
    {
        $this->articles = $articleServices;

    }
    /**
     * @name 首页搜索
     * @desc 首页搜索
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->input('search'))->where('deleted_at',0)->paginate(4);
        foreach ($articles as $k=>$v){
            $articles[$k]['content'] = EndaEditor::MarkDecode($v->content);
        }
        return view('blog.search',['articles'=>$articles]);
    }
}