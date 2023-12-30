<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cafe extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'slug',
        'location_name',
        'description',
        'primary_image_url',
        'address',
        'city',
        'state',
        'province',
        'territory',
        'zip',
        'latitude',
        'longitude',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** @return BelongsTo<Company, Cafe> */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
