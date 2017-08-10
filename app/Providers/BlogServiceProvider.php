<?php

namespace App\Providers;


use App\Models\Admin\Article;
use App\Models\Admin\Cat;
use App\Services\Admin\ArticleServicesImpl;
use App\Services\Admin\CatServicesImpl;
use App\Services\Admin\CommentsServicesImpl;
use App\Services\Admin\TagServicesImpl;
use DB;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        ////归档
        view()->composer('blog.common.archives',function($view){
            $archives = Article::archives();
            $view->with('archives',$archives);
        });
        //分类
        view()->composer('blog.common.cats',function($view){
            $cats = Cat::where('deleted_at',0)->get();
            $view->with('cats',$cats);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //文章
        $this->app->singleton('App\Services\Ifs\Admin\ArticleServices',function(){
            return new ArticleServicesImpl();
        });
        //分类
        $this->app->singleton('App\Services\Ifs\Admin\CatServices',function(){
            return new CatServicesImpl();
        });
        //标签
        $this->app->singleton('App\Services\Ifs\Admin\TagServices',function(){
            return new TagServicesImpl();
        });
        //评论
        $this->app->singleton('App\Services\Ifs\Admin\CommentsServices',function(){
            return new CommentsServicesImpl();
        });

    }
}
