<?php

declare(strict_types=1);

namespace App\Filters\Company;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\Filters\Filter;

class CompanySubscriptionFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property): void
    {
        Log::error('Subscription filters called with value ' . $value);

        $truthValues = collect([true, 'true', 1, '1']);

        if ($truthValues->contains($value)) {
            $query->where('subscription', true);
        }
    }
}
