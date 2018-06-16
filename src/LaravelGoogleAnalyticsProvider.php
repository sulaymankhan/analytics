<?php

namespace sulaymankhan\analytics;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
class LaravelGoogleAnalyticsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/app.php' => config_path('app.php'),
        ]);
        $this->app->register(\Spatie\Analytics\AnalyticsServiceProvider::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('Analytics', '\Spatie\Analytics\AnalyticsFacade');
    
        require __DIR__ . '/config/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/app.php', 'analytics');
  
    }
}
