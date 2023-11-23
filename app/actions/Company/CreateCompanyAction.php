<?php

declare(strict_types=1);

namespace App\actions\Company;

use App\actions\UploadFileAction;
use App\Dto\Company\CompanyStoreData;
use App\Models\Company;
use App\Models\User;

class CreateCompanyAction
{
    public function execute(CompanyStoreData $data, User $user): Company
    {
        $uploadFileAction = app(UploadFileAction::class);

        $company = Company::query()->create([
            ...$data->toArray(),
            'added_by' => $user->id,
            'logo_url' => $uploadFileAction->execute($data->logo),
            'header_image_url' => $uploadFileAction->execute($data->header),
        ]);

        if ($data->cafe) {
            app(CreateCafeAction::class)->execute($data->cafe);
        }

        return $company;
    }
}
