<?php

declare(strict_types=1);

namespace App\Dto\Company;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class CompanyStoreData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly int $roaster,
        public readonly int $subscription,
        public readonly ?string $website,
        public readonly ?string $address,
        public readonly string $city,
        public readonly ?string $facebookUrl,
        public readonly ?string $twitterUrl,
        public readonly ?string $instagramUrl,
        public readonly UploadedFile $logo,
        public readonly UploadedFile $header,
        public readonly ?CafeStoreData $cafe,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'roaster' => $this->roaster,
            'subscription' => $this->subscription,
            'website' => $this->website,
            'address' => $this->address,
            'city' => $this->city,
            'facebook_url' => $this->facebookUrl,
            'twitter_url' => $this->twitterUrl,
            'instagram_url' => $this->instagramUrl,
        ];
    }
}
