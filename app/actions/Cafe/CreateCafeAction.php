<?php

declare(strict_types=1);

namespace App\actions\Cafe;

use App\actions\UploadFileAction;
use App\Dto\Company\CafeStoreData;
use App\Models\Cafe;
use App\Models\Company;

class CreateCafeAction
{
    public function execute(CafeStoreData $data, Company $company): Cafe
    {
        $cafe = Cafe::query()->create([
            ...$data->toArray(),
            'company_id' => $company->id,
            'primary_image_url' => app(UploadFileAction::class)->execute($data->primaryImage),
        ]);

        $cafe = app(SaveCafeCoordinatesAction::class)->execute($cafe);


        return $cafe;
    }
}
