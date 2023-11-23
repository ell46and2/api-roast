<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function show(): JsonResponse
    {
        return response()->json(authenticatedUser());
    }
}
