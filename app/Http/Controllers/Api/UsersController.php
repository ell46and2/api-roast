<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    /**
     * @group User
     *
     * Get the authenticated user
     *
     * @apiResource App\Http\Resources\UserResource
     */
    public function show(): UserResource
    {
        return new UserResource(authenticatedUser());
    }
}
