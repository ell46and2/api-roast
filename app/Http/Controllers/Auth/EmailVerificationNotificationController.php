<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        if (authenticatedUser()->hasVerifiedEmail()) {
            return response()->json('User already has a verified email!');
        }

        authenticatedUser()->sendApiEmailVerificationNotification();

        return response()->json(['status' => 'verification-link-sent']);
    }
}
