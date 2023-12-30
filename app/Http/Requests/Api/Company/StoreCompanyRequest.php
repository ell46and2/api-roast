<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Company;

use App\Dto\Company\CafeStoreData;
use App\Dto\Company\CompanyStoreData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class StoreCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'roaster' => [
                'required',
                'integer',
            ],
            'subscription' => [
                'required',
                'integer',
            ],
            'website' => [
                'nullable',
                'url',
            ],
            'address' => [
                'nullable',
                'string',
            ],
            'city' => [
                'required',
                'string',
            ],
            'facebook_url' => [
                'nullable',
                'url',
            ],
            'twitter_url' => [
                'nullable',
                'url',
            ],
            'instagram_url' => [
                'nullable',
                'url',
            ],
            'logo' => [
                'required',
                'file',
                'image',
            ],
            'header' => [
                'required',
                'file',
                'image',
            ],
            'cafe' => [
                'sometimes',
            ],
            'cafe.location_name' => [
                'required_with:cafe',
                'string',
            ],
            'cafe.primary_image' => [
                'required_with:cafe',
                'file',
                'image',
            ],
            'cafe.address' => [
                'required_with:cafe',
                'string',
            ],
            'cafe.city' => [
                'required_with:cafe',
                'string',
            ],
            'cafe.zip' => [
                'required_with:cafe',
                'string',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name of the company is required',
            'name.string'  => 'The name must be a string',
            'roaster.required' => 'A flag declaring the company as a roaster or not is required',
            'roaster.integer' => 'The flag declaring a roaster must be an integer',
            'subscription.required' => 'A flag declaring the company has a subscription or not is required',
            'subscription.integer' => 'The flag declaring a subscription for the company must be an integer',
            'description.string' => 'The description must be a string',
            'website.url' => 'The website of the company must be a URL',
            'address.required' => 'The address of the company is required',
            'address.string' => 'The address of the company must be a string',
            'city.required' => 'The city the company resides in is required',
            'city.string' => 'The city the company resides in must be a string',
            'facebook_url.url' => 'The URL of the company\'s Facebook page must be a valid URL',
            'twitter_url.url' => 'The URL of the company\'s Twitter feed must be a valid URL',
            'instagram_url.url' => 'The URL of the company\s Instagram feed must be a valid URL',
            'logo.required' => 'The logo field is required',
            'logo.file' => 'The logo must be an image file',
            'logo.image' => 'The logo file must be an image',
            'header.required' => 'The header field is required',
            'header.file' => 'The header must be an image file',
            'header.image' => 'The header file must be an image',
            'cafe.location_name.required_with' => 'The location name is required for this cafe',
            'cafe.location_name.string' => 'The location name must be a string',
            'cafe.primary_image.required_with' => 'A primary image is required for this cafe',
            'cafe.primary_image.file' => 'The primary image must be an image file',
            'cafe.primary_image.image' => 'The primary image must be an image',
            'cafe.address.required_with' => 'An address is required for this cafe',
            'cafe.address.string' => 'An address must be a string',
            'cafe.city.required_with' => 'A city is required for this cafe',
            'cafe.city.string' => 'A city must be a string',
            'cafe.zip.required_with' => 'A zip is required for this cafe',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): CompanyStoreData
    {
        /** @var UploadedFile $logoFile */
        $logoFile = $this->file('logo');

        /** @var UploadedFile $headerFile */
        $headerFile = $this->file('header');

        return new CompanyStoreData(
            name: $this->string('name')->toString(),
            roaster: $this->integer('roaster'),
            subscription: $this->integer('subscription'),
            website: $this->has('website') ? $this->string('website')->toString() : null,
            address: $this->has('address') ? $this->string('address')->toString() : null,
            city: $this->string('city')->toString(),
            facebookUrl: $this->has('facebook_url') ? $this->string('facebook_url')->toString() : null,
            twitterUrl: $this->has('twitter_url') ? $this->string('twitter_url')->toString() : null,
            instagramUrl: $this->has('instagram_url') ? $this->string('instagram_url')->toString() : null,
            logo: $logoFile,
            header: $headerFile,
            cafe: $this->cafeData(),
        );
    }

    public function cafeData(): CafeStoreData|null
    {
        if( ! $this->has('cafe')) {
            return null;
        }

        /** @var UploadedFile $primaryImageFile */
        $primaryImageFile = $this->file('cafe.primary_image');

        return new CafeStoreData(
            locationName: $this->string('cafe.location_name')->toString(),
            primaryImage: $primaryImageFile,
            address: $this->string('cafe.address')->toString(),
            city: $this->string('cafe.city')->toString(),
            zip: $this->string('cafe.zip')->toString(),
        );
    }
}
