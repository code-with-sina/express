<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminTransactionNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $name;
    public $transactionId;
    public $amount;
    public $body;
    public $complement;
    public $signature;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $transactionId, $amount)
    {
        //
        $this->name = $name;
        $this->transactionId = $transactionId;
        $this->amount = $amount;
        $this->body = "A transaction has been initiated";
        $this->complement   = 'Take care';
        $this->signature = env('APP_SIGNATURE');
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
            subject: 'Admin Transaction Notification',
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
            markdown: 'emails.admin.transaction-notification',
            with: [
                'name'          => $this->name,
                'transactionId' => $this->transactionId,
                'amount'        => $this->amount,
                'body'          => $this->body,
                'complement'    => $this->complement,
                'signature'     => $this->signature
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
