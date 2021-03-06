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
use App\Services\Ifs\Admin\CatServices;
use App\Services\Ifs\Admin\TagServices;
use DB;
use Jenssegers\Date\Date;
use YuanChao\Editor\EndaEditor;
use App\Services\Ifs\Admin\ArticleServices;

class IndexController extends controller
{
    protected $articles;
    protected $cat;
    protected $tag;

    public function __construct(ArticleServices $articleServices,
                                CatServices $catServices,
                                TagServices $tagServices)
    {
        $this->articles = $articleServices;
        $this->cat = $catServices;
        $this->tag = $tagServices;
    }
    /**
     * @name 后台首页
     * @desc 后台首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->articles->getAllByPaginate(6);
        //分类
        return view('blog.index.index',['articles'=>$articles]);
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
        $db = DB::table('blog_article');
        $urls['pre'] = $db->where('id', '<', $id)->max('id');
        $urls['next'] = $db->where('id', '>', $id)->min('id');
        $article['content'] = EndaEditor::MarkDecode($article->content);
        return view('blog.article.index',['article'=>$article,'urls'=>$urls]);
    }

    /**
     * @name 文章存档
     * @desc
     * @param $year
     * @param $month
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archives($year, $month)
    {
        $model = new Article();
        $data = $model->getArchives($year,$month,6);
        return view('blog.index.index',['articles'=>$data]);
    }

    /**
     * @name  根据分类获取文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catArticle($id)
    {
        $cat = $this->cat->getOne($id);
        $data = $cat->articles()->where('deleted_at',0)->paginate(4);
        return view('blog.index.index',['articles'=>$data]);
    }

    public function tagArticle($id)
    {
        $data = $this->tag->getOne($id)->articles()->where('deleted_at',0)->paginate(4);
        return view('blog.index.index',['articles'=>$data]);
    }
}