<?php

declare(strict_types=1);

namespace App\Services\GoogleMaps;

use App\Services\GoogleMaps\DTO\GoogleGeocodeCoordinates;
use Illuminate\Support\Facades\Http;

class GoogleMapsClient
{
    public function __construct(
        private readonly string $key,
        private readonly string $baseUrl
    ) {
    }

    public function getGeocodeAddress(
        string $address,
        string $city,
        string $state,
        string $zip
    ): GoogleGeocodeCoordinates {
        $url = $this->baseUrl . '?address=' . urlencode($address . ' ' . $city . ', ' . $state . ' ' . $zip) . '&key=' . $this->key;

        $response = Http::retry(2, 100)
            ->get($url)
            ->object();

        return new GoogleGeocodeCoordinates(
            latitude: $response?->results[0]?->geometry?->location?->lat ?? 0,
            longitude: $response?->results[0]?->geometry?->location?->lng ?? 0,
        );
    }
}
