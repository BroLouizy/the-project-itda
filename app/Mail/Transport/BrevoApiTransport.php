<?php

namespace App\Mail\Transport;

use Illuminate\Support\Facades\Http;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Email;

class BrevoApiTransport extends AbstractTransport
{
    public function __construct(protected string $apiKey)
    {
        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        $email = $message->getOriginalMessage();

        if (! $email instanceof Email) {
            throw new \RuntimeException('BrevoApiTransport hanya mendukung pesan Email.');
        }

        $from = $email->getFrom()[0];

        $to = array_map(fn ($addr) => [
            'email' => $addr->getAddress(),
            'name' => $addr->getName() ?: null,
        ], $email->getTo());

        $payload = [
            'sender' => [
                'email' => $from->getAddress(),
                'name' => $from->getName() ?: config('mail.from.name'),
            ],
            'to' => $to,
            'subject' => $email->getSubject(),
            'htmlContent' => $email->getHtmlBody() ?: nl2br((string) $email->getTextBody()),
        ];

        if ($email->getTextBody()) {
            $payload['textContent'] = $email->getTextBody();
        }

        $response = Http::withHeaders([
            'api-key' => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', $payload);

        if ($response->failed()) {
            throw new \RuntimeException('Brevo API error: ' . $response->body());
        }
    }

    public function __toString(): string
    {
        return 'brevo+api';
    }
}