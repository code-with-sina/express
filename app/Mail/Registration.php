<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Registration extends Mailable
{
    use Queueable, SerializesModels;
    public  $name;
    public $url;
    public $body;
    public $complement;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $url, $body, $complement)
    {
        $this->name     = $name;
        $this->url      = $url;
        $this->body     = $body;
        $this->complement   = $complement;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("no-reply@ratefy.co", "Ratefy"),
            subject: 'Verification'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.registration.register',
            with: [
                'name'              => $this->name,
                'link'              => $this->url,
                'Body'              => $this->body,
                'ComplementaryClosure' => $this->complement,
                'SignatureLine' => env('APP_SIGNATURE'),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
