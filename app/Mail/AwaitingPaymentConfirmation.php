<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AwaitingPaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name;
    public $transactionId;
    public $amount;
    public $created;
    public $signature;
    public $complement;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $transactionId, $amount, $created)
    {
        //
        $this->name = $name;
        $this->transactionId = $transactionId;
        $this->amount   = $amount;
        $this->created = $created;
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
            from: new Address("no-reply@ratefy.co", "Ratefy"),
            subject: 'Your payment is being confirmed',
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
            markdown: 'emails.user-payments.awaiting-payment-confirmation',
            with: [
                'name'          => $this->name,
                'transactionId' => $this->transactionId,
                'amount'        => $this->amount,
                'date'          => $this->created,
                'signature'     => $this->signature,
                'complement'    => $this->complement
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
