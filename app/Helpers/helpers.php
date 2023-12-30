<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

if( ! function_exists('authenticatedUser')) {
    /**
     * @throws BindingResolutionException
     */
    function authenticatedUser(string $exceptionMsg = "No unauthenticated access is allowed"): User
    {
        $user = app()->make(Authenticatable::class);

        if( ! $user instanceof User) {
            throw new UnauthorizedHttpException($exceptionMsg);
        }

        return $user;
    }
}
