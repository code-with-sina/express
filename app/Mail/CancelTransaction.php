<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelTransaction extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $body;
    public $transactionId;
    public $primaryBody;
    public $subPrimaryBody;
    public $cautionaryNote;
    public $amount;
    public $transactionTime;
    public $complement;
    public $signature;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $orderId,  $transactionTime)
    {
        //

        $this->name             = $name;
        $this->transactionId    = $orderId;
        $this->primaryBody      = 'So sorry to informed you that your recently opened transaction has been closed.';
        $this->subPrimaryBody  = 'Due to: Time elaspe, violation of ratefy policies, irregularities, admin observation or You simply cancelled it';
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
    public function envelope()
    {
        return new Envelope(
            from: new Address("no-reply@ratefy.co", "Ratefy"),
            subject: 'Cancelled Transaction',
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
            markdown: 'emails.user-payments.cancellation',
            with: [
                'name'                  => $this->name,
                'primaryBody'           => $this->primaryBody,
                'subPrimaryBody'        => $this->subPrimaryBody,
                'transactionId'         => $this->transactionId,
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
