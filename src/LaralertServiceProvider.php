<?php

namespace FreshbaseIo\Laralert;

use FreshbaseIo\Laralert\Console\UpdateCommand;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LaralertServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'command.laralert.update',
            function () {
                return new UpdateCommand();
            }
        );

        $this->commands(
            'command.laralert.update',
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.laralert.update'];
    }
}
