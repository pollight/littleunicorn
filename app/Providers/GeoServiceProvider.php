<?php

namespace App\Providers;

use App\Services\GeoServices;
use Illuminate\Support\ServiceProvider;

class GeoServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Services\GeoServices', function ($app) {
            return new GeoServices();
        });
    }
}
