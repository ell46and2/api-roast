<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;



    public function update(User $user, Company $company): bool
    {
    }

    public function delete(User $user, Company $company): bool
    {
    }

    public function restore(User $user, Company $company): bool
    {
    }

    public function forceDelete(User $user, Company $company): bool
    {
    }
}
