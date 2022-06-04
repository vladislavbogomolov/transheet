<?php

namespace Vladislavbogomolov\Transheet;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Vladislavbogomolov\Transheet\Console\TransheetCommand;


class TransheetServiceProvider extends ServiceProvider implements DeferrableProvider {

    public function boot() {
        $source = realpath($raw = __DIR__.'/../config/transheet.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('transheet.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('transheet');
        }

        $this->mergeConfigFrom($source, 'transheet');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.transheet', function () {
            return new TransheetCommand;
        });

        $this->commands(['command.transheet']);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.transheet'];
    }
}
