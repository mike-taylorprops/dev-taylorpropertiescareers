<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailEmployee extends Mailable
{
    use Queueable, SerializesModels;

    public array $details;

    public function __construct(array $details)
    {
        $this->details = $details;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('clientservices@taylorprops.com', 'Taylor Properties Careers'),
            replyTo: [new Address($this->details['email'], $this->details['name'])],
            subject: 'New Message from TaylorPropertiesCareers.com',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email_employee',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
