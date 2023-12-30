<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\GoogleMaps\GoogleMapsClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use League\Config\Exception\InvalidConfigurationException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GoogleMapsClient::class, function (Application $app): GoogleMapsClient {
            $baseUrl = config('services.google_maps.geocode_base_url');
            $key = config('services.google_maps.key');

            if(empty($key)) {
                throw new InvalidConfigurationException('Missing api key for google geocoding');
            }

            return new GoogleMapsClient(
                key: $key,
                baseUrl: $baseUrl,
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
