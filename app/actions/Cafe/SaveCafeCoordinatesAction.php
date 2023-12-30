<?php

declare(strict_types=1);

namespace App\actions\Cafe;

use App\Models\Cafe;
use App\Services\GoogleMaps\GoogleMapsClient;

class SaveCafeCoordinatesAction
{
    public function execute(Cafe $cafe): Cafe
    {
        $coordinates = app(GoogleMapsClient::class)->getGeocodeAddress(
            $cafe->address,
            $cafe->city,
            $cafe->state,
            $cafe->zip
        );

        $cafe->update($coordinates->toArray());

        return $cafe;
    }
}
