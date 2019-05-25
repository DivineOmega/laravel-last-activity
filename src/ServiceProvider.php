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
            __DIR__ . '/database/migrations/2019_05_25_151711_add_last_activity_to_users_table.php'
                => database_path('migrations/2019_05_25_151711_add_last_activity_to_users_table.php')
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/last-activity.php', 'last-activity'
        );
    }
}