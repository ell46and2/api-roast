<?php

declare(strict_types=1);

namespace App\Filters\Company;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\Filters\Filter;

class CompanyLikedFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property): void
    {
        $truthValues = collect([true, 'true', 1, '1']);

        if ($truthValues->contains($value) && Auth::guard('sanctum')->check()) {
            $query->whereHas('likes', function (Builder $q): void {
                $q->where('user_id', Auth::guard('sanctum')->user()->id);
            });
        }
    }
}
