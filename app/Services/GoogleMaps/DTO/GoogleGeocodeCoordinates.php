<?php

declare(strict_types=1);

namespace App\Services\GoogleMaps\DTO;

use Spatie\LaravelData\Data;

class GoogleGeocodeCoordinates extends Data
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
    ) {
    }
}
