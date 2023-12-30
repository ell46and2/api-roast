<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'header_image_url',
        'logo_url',
        'slug',
        'roaster',
        'subscription',
        'description',
        'website',
        'address',
        'city',
        'state',
        'province',
        'territory',
        'zip',
        'country',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'added_by',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'roaster' => 'boolean',
        'subscription' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** @return BelongsTo<User, Company> */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
