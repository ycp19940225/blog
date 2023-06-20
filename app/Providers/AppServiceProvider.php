<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton(\Laravel\Scout\EngineManager::class, function ($app) {
            return new \App\Services\Scout\EngineManager($app);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //ide-helper
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
