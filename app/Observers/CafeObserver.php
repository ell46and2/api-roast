<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Cafe;
use Illuminate\Support\Str;

class CafeObserver
{
    public function creating(Cafe $cafe): void
    {
        $cafe->slug = Str::slug($cafe->location_name . ' ', $cafe->city);
    }

    public function updating(Cafe $cafe): void
    {
        $cafe->slug = Str::slug($cafe->location_name . ' ', $cafe->city);
    }
}
