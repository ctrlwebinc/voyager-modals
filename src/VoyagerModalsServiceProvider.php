<?php

namespace Ctrlweb\VoyagerModals;

use Illuminate\Support\ServiceProvider;

class VoyagerModalsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'voyager-modals');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'voyager-modals');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/voyager-modals.php', 'voyager-modals');

        // Register the service the package provides.
        $this->app->singleton('voyager.modals', function ($app) {
            return new VoyagerModals;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['voyager.modals'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/voyager-modals.php' => config_path('voyager-modals.php'),
        ], 'voyager-modals.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ctrlweb'),
        ], 'voyager-modals.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ctrlweb'),
        ], 'voyager-modals.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ctrlweb'),
        ], 'voyager-modals.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
