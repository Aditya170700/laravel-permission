<?php

namespace Adityaricki\LaravelPermission;

use Adityaricki\LaravelPermission\Console\Commands\SyncRoutes;
use Illuminate\Support\ServiceProvider;

class LaravelPermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SyncRoutes::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/laravel-permission.php', 'laravel-permission');
        $this->publishes([
            __DIR__ . '/config/laravel-permission.php' => config_path('laravel-permission.php'),
            __DIR__ . '/database/migrations/' => database_path('migrations'),
            __DIR__ . '/Models' => app_path('Models'),
        ]);
    }

    public function register()
    {
        //
    }
}
