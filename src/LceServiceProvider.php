<?php

namespace Clivern\Lce;

use Illuminate\Support\ServiceProvider;

use Clivern\Lce\Lce;

class LceServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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
        // Bind css parser
        $this->app['lce'] = $this->app->share(function () {
            return new Lce();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(
            'lce'
        );
    }
}
