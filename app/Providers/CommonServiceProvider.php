<?php

namespace App\Providers;

use App\Services\Admin\AdminLoginServicesImpl;
use App\Services\Admin\PriServicesImpl;
use App\Services\Admin\RoleServicesImpl;
use App\Services\Admin\UserServicesImpl;
use App\Services\Common\UploadServicesImpl;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
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
        //file
        $this->app->singleton('App\Services\Ifs\Common\UploadServices',function(){
            return new UploadServicesImpl();
        });
    }
}
