<?php

namespace Alqudiry\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/app' => app_path('../app'),
            __DIR__ . '/config' => app_path('../config'),
            __DIR__ . '/database' => app_path('../database'),
            __DIR__ . '/resources' => app_path('../resources'),
            __DIR__ . '/others' => app_path('../'),
        ]);
    }
}
