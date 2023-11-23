<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Company;

use App\actions\Company\CreateCompanyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\StoreCompanyRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreCompanyController extends Controller
{
    public function __invoke(StoreCompanyRequest $request): JsonResponse
    {
        $user = authenticatedUser();

        $company = app(CreateCompanyAction::class)->execute($request->toDto(), $user);

        return response()->json($company, Response::HTTP_CREATED);
    }
}
