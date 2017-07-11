<?php

namespace App\Providers;


use App\Services\Admin\ArticleServicesImpl;
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

    }
}
