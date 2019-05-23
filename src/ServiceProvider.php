<?php

namespace DivineOmega\LaravelLastActivity;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap package.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/last-activity.php' => config_path('last-activity.php'),
        ]);
    }
}