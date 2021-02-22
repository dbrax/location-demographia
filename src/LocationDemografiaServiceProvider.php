<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github:https://github.com/dbrax/location-demographia
 * Email: epmnzava@gmail.com
 * 
 */

namespace Epmnzava\LocationDemografia;

use Illuminate\Support\ServiceProvider;

class LocationDemografiaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'location-demografia');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'location-demografia');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('location-demografia.php'),
            ], 'config');


                       //publishing migrations here..
                       if (!class_exists('CreateStatesTable') && !class_exists('CreateCountriesTable') && !class_exists('CreateCitiesTable')) {
                        $this->publishes([
                            __DIR__ . '/../database/migrations/create_cities_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cities_table_table.php'),
                            __DIR__ . '/../database/migrations/create_countries_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_countries_table.php'),
                            __DIR__ . '/../database/migrations/create_states_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_states_table.php'),

        
                        ], 'migrations');
                    }

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/location-demografia'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/location-demografia'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/location-demografia'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'location-demografia');

        // Register the main class to use with the facade
        $this->app->singleton('location-demografia', function () {
            return new LocationDemografia;
        });
    }
}
