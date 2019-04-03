<?php

namespace Ctrlweb\VoyagerPageBlocksModals;

use Illuminate\Support\ServiceProvider;

class VoyagerPageBlocksModalsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ctrlweb');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ctrlweb');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/voyager-page-blocks-modals.php', 'voyager-page-blocks-modals');

        // Register the service the package provides.
        $this->app->singleton('voyager-page-blocks.modals', function ($app) {
            return new VoyagerPageBlocksModals;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['voyager-page-blocks.modals'];
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
            __DIR__.'/../config/voyager-page-blocks-modals.php' => config_path('voyager-page-blocks-modals.php'),
        ], 'voyager-page-blocks-modals.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ctrlweb'),
        ], 'voyager-page-blocks-modals.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ctrlweb'),
        ], 'voyager-page-blocks-modals.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ctrlweb'),
        ], 'voyager-page-blocks-modals.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
