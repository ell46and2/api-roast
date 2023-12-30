<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Company;

use App\Filters\Company\CompanyLikedFilter;
use App\Filters\Company\CompanySubscriptionFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class IndexCompanyController extends Controller
{
    /**
     * @group Company
     *
     * Retrieve a paginated list of companies based on specified filters and sorting.
     *
     * @queryParam filter[name] Filter companies by name. Example: Starbucks
     * @queryParam filter[city] string Filter companies by city. Example: New York
     * @queryParam filter[state] string Filter companies by state. Example: California
     * @queryParam filter[roaster] boolean Filter companies by roaster status (exact match). Example: true
     * @queryParam filter[subscription] boolean Filter companies using a custom filter for subscription status. Example: true
     * @queryParam filter[liked] boolean Filter companies using a custom filter for liked status. Example: true
     * @queryParam sort string Sort the results by the specified column. Example: name
     *
     * @apiResourceCollection status=200 App\Http\Resources\CompanyResource
     * @apiResourceModel App\Models\Company paginate=15
     */
    public function __invoke(Request $request)
    {
        $companies = QueryBuilder::for(Company::class)
            ->allowedFilters([
                'name',
                'city',
                'state',
                AllowedFilter::exact('roaster'),
                AllowedFilter::custom('subscription', new CompanySubscriptionFilter()),
                AllowedFilter::custom('liked', new CompanyLikedFilter()),
            ])
            ->allowedSorts([
                'name'
            ])
            ->with(['addedBy'])
            ->paginate($request->integer('take') ?? 15);

        return response()->json(
            CompanyResource::collection($companies)->response()->getData(),
            Response::HTTP_OK
        );
    }
}
