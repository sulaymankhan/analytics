# Laravel Google Analytics Dashboard

This package enables you to easily add a Google Analytics Dashboard in your Laravel App. This package is using https://github.com/spatie/laravel-analytics to connect with Google Analytics API and is more focused on view and visualization of data.

## Getting Started

In order to use this package you need to create Google Analytics Credentials. Follow the instructions on https://github.com/spatie/laravel-analytics


### Installing

You can install this page using Composer.

composer require sulaymankhan/analytics:"dev-master"

php artisan vendor:publish --provider="sulaymankhan\analytics\LaravelGoogleAnalyticsProvider"


// config/app.php

"providers"=>[
 	sulaymankhan\analytics\LaravelGoogleAnalyticsProvider::class,
 ]

### More information coming soon


## Authors

* Mohammad Sulayman


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* https://github.com/spatie/laravel-analytics

