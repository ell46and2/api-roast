<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Company;

use App\actions\Company\CreateCompanyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\StoreCompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreCompanyController extends Controller
{
    /**
     * @group Company
     *
     * Add a new company
     *
     * @apiResource status=201 App\Http\Resources\CompanyResource
     * @apiResourceModel App\Models\Company
     */
    public function __invoke(StoreCompanyRequest $request): JsonResponse
    {
        $user = authenticatedUser();

        $company = app(CreateCompanyAction::class)->execute($request->toDto(), $user);

        return response()->json(
            new CompanyResource($company),
            Response::HTTP_CREATED
        );
    }
}
