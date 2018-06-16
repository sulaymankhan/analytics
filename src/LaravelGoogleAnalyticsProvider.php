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
 
  
    }
}
