<?php

namespace sulaymankhan\analytics;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use sulaymankhan\analytics\Http\Middleware\UserAccess;
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
            __DIR__.'/config/app.php' => config_path('analytics.php'),
        ]);
        $this->publishes([
            __DIR__.'/assets/' => public_path('vendor/analytics'),
        ], 'public');
        $this->app->register(\Spatie\Analytics\AnalyticsServiceProvider::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('Analytics', '\Spatie\Analytics\AnalyticsFacade');
        $this->app['router']->aliasMiddleware('UserAccess' , UserAccess::class);
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
        $this->loadViewsFrom(__DIR__.'/views', 'analytics');
  
    }
}
