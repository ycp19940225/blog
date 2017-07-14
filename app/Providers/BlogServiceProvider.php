<?php

namespace App\Providers;


use App\Services\Admin\ArticleServicesImpl;
use App\Services\Admin\CatServicesImpl;
use App\Services\Admin\TagServicesImpl;
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
        //
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

    }
}
