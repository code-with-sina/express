<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentInstruction extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $body;
    public $transactionId;
    public $amount;
    public $transactionTime;
    public $complement;
    public $signature;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $body, $orderId, $amount,  $transactionTime)
    {
        //


        $this->name             = $name;
        $this->body             = $body;
        $this->transactionId    = $orderId;
        $this->amount           = $amount;
        $this->primaryBody      = 'The transaction has started. Please, follow the instruction as stated by the receiver';
        $this->cautionaryNote   = 'If you did not initiate any transaction, please contact us immediately.';
        $this->complement       = 'Thank you';
        $this->signature        = env('APP_SIGNATURE');
        $this->transactionTime  = $transactionTime;
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
            subject: 'Make Payment Now!',
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
            markdown: 'emails.user-payments.payment-guide',
            with: [
                'name'                  => $this->name,
                'primaryBody'           => $this->primaryBody,
                'body'                  => $this->body,
                'transactionId'         => $this->transactionId,
                'amount'                => $this->amount,
                'transactionTime'       => $this->transactionTime,
                'cautionaryNote'        => $this->cautionaryNote,
                'complement'            => $this->complement,
                'signature'             => $this->signature
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
