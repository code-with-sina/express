<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
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
    public function __construct($name, $url, $body)
    {
        //
        $this->name     = $name;
        $this->url      = $url;
        $this->body     = 'Welcome to Ratefy – we’re excited to have you on board🤩
 
        We believe our platform will help you receive and exchange foreign currency payment to Naira.
        To ensure you gain the very best out of our service, we’ve put together some of the most helpful guides:
        This video <a href="https://youtu.be/9AdmQgWQUZQ">Ratefy.co</a> walks you through setting up your Ratefy account for the first time. Our FAQ <a href="https://ratefy">Ratefy.co</a> is a great place to find the answers to common questions you might have as a new user. Our Youtube channel <a href="https://www.youtube.com/channel/UChJ99l34thtPUOsvS4OxQsg">Ratefy</a> has work-through on various ways you can use Ratefy. Our blog <a href="https://ratefy.co/blog">Blog</a> has some great tips and best practices to ensure you freelance journey is a success.
        Have any questions or need more information? Just shoot us an email! We’re always here to help. Feel free to hit us up on Instagram <a href="https://www.instagram.com/ratefy.co/">Ratefy.co</a> or Twitter <a href="https://twitter.com/_Ratefy">Ratefy.co </a> , if you want a fast response, too.
        ';
        $this->complement   = 'Take care';
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
            subject: 'Welcome To Ratefy'
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
            markdown: 'emails.welcome.signup-welcome',
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
