<?php

namespace Hgy\PackageTest\Providers;

use Hgy\PackageTest\Middleware\FirstMiddleware;
use Hgy\PackageTest\Middleware\SecondMiddleware;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
        'Hgy\PackageTest\Console\SayHelloCommand',

    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'package.first'        => FirstMiddleware::class,
        'package.second'        => SecondMiddleware::class,

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'package' => [
            'package.first',
            'package.second',

        ],
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'packages');
        $this->loadRoutesFrom(__DIR__ . '/../../route/routes.php');
        $this->publishes([__DIR__ . '/../../config' => config_path(),'p-test']);
        $this->publishes([__DIR__.'/../../database/migrations' => database_path('migrations')], 'packages-migrations');


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
        $this->registerRouteMiddleware();
        $this->commands($this->commands);
//        $this->mergeConfigFrom(
//            __DIR__ . '/../../config/ptest.php', 'ptest'
//        );
    }


    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}
