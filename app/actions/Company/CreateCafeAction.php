<?php

declare(strict_types=1);

namespace App\actions\Company;

use App\Dto\Company\CafeStoreData;
use App\Models\Company;

class CreateCafeAction
{
    public function execute(CafeStoreData $data): Cafe
    {
        $company = Company::create($data->toArray());

        //        if($data->cafe) {
        //
        //        }

        return $company;
    }
}
