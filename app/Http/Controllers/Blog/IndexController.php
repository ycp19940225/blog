<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use DB;
use YuanChao\Editor\EndaEditor;
use App\Services\Ifs\Admin\ArticleServices;

class IndexController extends controller
{
    protected $articles;

    public function __construct(ArticleServices $articleServices)
    {
        $this->articles = $articleServices;
    }
    /**
     * @name 后台首页
     * @desc 后台首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->articles->getAllByPaginate(4);
        foreach ($articles as $k=>$v){
            $articles[$k]['content'] = EndaEditor::MarkDecode($v->content);
        }
        //归档
        $archives = DB::table('blog_article')
            ->selectRaw('year(FROM_UNIXTIME(created_at))  year, monthname(FROM_UNIXTIME(created_at)) month, count(*) published')
            ->where('deleted_at',0)
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get();
        //分类
        return view('blog.index.index',['articles'=>$articles,'archives'=>$archives]);
    }

    /**
     * @name 文章详情
     * @desc
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function article($id)
    {
        $article = $this->articles->getOne($id);
        $urls['pre'] = DB::table('blog_article')->where('id', '<', $id)->max('id');
        $urls['next'] = DB::table('blog_article')->where('id', '>', $id)->min('id');
        $article['content'] = EndaEditor::MarkDecode($article->content);
        return view('blog.article.index',['article'=>$article,'urls'=>$urls]);
    }


}