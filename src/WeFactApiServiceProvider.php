<?php

namespace Media101\WeFactApi;

use Illuminate\Support\ServiceProvider;

class WeFactApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/wefact.php' => config_path('wefact.php'),
            ], 'config');
        }

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/wefact.php', 'wefact');

        $this->app->bind(WeFact::class, function ($app) {
            return new (config('wefact.type'));
        });
    }
}