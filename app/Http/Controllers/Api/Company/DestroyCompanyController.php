<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DestroyCompanyController extends Controller
{
    /**
     * @group Company
     *
     * Get company
     *
     * @urlParam slug string required The slug of the company.
     *
     * @resource status=204
     */
    public function __invoke(Company $company): JsonResponse
    {
        return response()->json(
            new CompanyResource($company),
            Response::HTTP_OK
        );
    }
}
