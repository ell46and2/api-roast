<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Company */
class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'header_image_url' => $this->header_image_url,
            'logo_url' => 'https://' . config('filesystems.disks.s3.url') . '/' . $this->logo_url,
            'slug' => $this->slug,
            'roaster' => $this->roaster,
            'subscription' => $this->subscription,
            'description' => $this->description,
            'website' => $this->website,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'province' => $this->province,
            'territory' => $this->territory,
            'zip' => $this->zip,
            'country' => $this->country,
            'facebook_url' => $this->facebook_url,
            'twitter_url' => $this->twitter_url,
            'instagram_url' => $this->instagram_url,
            'added_by' => $this->added_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'addedBy' => new UserResource($this->whenLoaded('addedBy')),
        ];
    }
}
