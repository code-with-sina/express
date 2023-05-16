<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $link;
    public $email;
    public $signature;
    public $complement;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $link, $email)
    {
        //
        $this->name = $name;
        $this->link = $link;
        $this->email = $email;
        $this->signature    =  env('APP_SIGNATURE');
        $this->complement   = 'Thank you';
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope():Envelope
    {
        return new Envelope(
            from: new Address("support@ratefy.co", "Ratefy"),
            subject: 'Password Reset',
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
            markdown: 'emails.security.reset-password',
            with: [
                'name'  => $this->name,
                'link'  => $this->link,
                'email' => $this->email,
                'signature'         => $this->signature,
                'complement'        => $this->complement
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
