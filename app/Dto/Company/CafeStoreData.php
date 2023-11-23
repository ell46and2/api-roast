<?php

declare(strict_types=1);

namespace App\Dto\Company;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class CafeStoreData extends Data
{
    public function __construct(
        public readonly string $locationName,
        public readonly UploadedFile $primaryImage,
        public readonly string $address,
        public readonly string $city,
        public readonly string $zip,
        public readonly int $country,
    ) {
    }
}
