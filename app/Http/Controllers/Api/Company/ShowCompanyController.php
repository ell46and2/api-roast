<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ShowCompanyController extends Controller
{
    /**
     * @group Company
     *
     * Get company
     *
     * @urlParam slug string required The slug of the company.
     *
     * @apiResource status=201 App\Http\Resources\CompanyResource
     * @apiResourceModel App\Models\Company
     */
    public function __invoke(Company $company): JsonResponse
    {
        return response()->json(
            new CompanyResource($company),
            Response::HTTP_OK
        );
    }
}
