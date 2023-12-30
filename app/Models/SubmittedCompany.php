<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmittedCompany extends Model
{
    use SoftDeletes;

    /** @return BelongsTo<User, SubmittedCompany> */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'addedBy');
    }
}
