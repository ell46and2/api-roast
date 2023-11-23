<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Mail\EmailVerificationMail;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Facades\URL;

class VerifyApiEmailNotification extends VerifyEmailBase
{
    public function toMail($notifiable): EmailVerificationMail
    {
        $url = self::verificationUrl($notifiable);
        /** @var \App\Models\User $notifiable */
        $name = $notifiable->name;

        return (new EmailVerificationMail($url, $name))
            ->to($notifiable->email);
    }

    protected function verificationUrl($notifiable): string
    {
        $prefix = config('app.frontend_url') . '/account/verify';

        /** @var \App\Models\User $notifiable */
        $temporarySignedUrl = URL::temporarySignedRoute(
            'verificationapi.verify',
            now()->addHour(),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return $prefix . '?verify_url=' . urlencode($temporarySignedUrl);
    }
}
