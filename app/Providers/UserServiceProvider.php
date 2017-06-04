<?php

namespace App\Providers;

use App\Services\Admin\UserServicesImpl;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        //
        $this->app->singleton('App\Services\Ifs\Admin\UserServices',function(){
            return new UserServicesImpl();
        });
    }
}
