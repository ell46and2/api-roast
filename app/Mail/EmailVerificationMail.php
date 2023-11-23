<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public string $url,
        public string $name,
    ) {
    }

    public function build(): self
    {
        return $this->view('emails.verify')
            ->text('emails.verify_plain')
            ->subject('Account Activation')
            ->from('noreply@roastandbrew.coffee', 'Roast');
    }
}
