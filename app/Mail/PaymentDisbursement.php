<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentDisbursement extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $amount;
    public $signature;
    public $complement;
    public $transactionId;
    public $bank_name;
    public $bank_account;
    public $bank_number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $amount, $transactionId, $bank_account, $bank_number, $bank_name)
    {
        //
        $this->name     = $name;
        $this->amount   = $amount;
        $this->signature    =  env('APP_SIGNATURE');
        $this->complement   = 'Thank you';
        $this->transactionId         = $transactionId;
        $this->bank_name         = $bank_name;
        $this->bank_account         = $bank_account;
        $this->bank_number         = $bank_number;
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
            subject: 'Your payout of ₦'.$this->amount. ' is on its way🥳',
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
            markdown: 'emails.user-payments.payout-notification',
            with: [
                'name'              => $this->name,
                'transactionId'     => $this->transactionId,
                'signature'         => $this->signature,
                'complement'        => $this->complement,
                'bank_name'              => $this->bank_name,
                'bank_account'              => $this->bank_account,
                'bank_number'              => $this->bank_number,
                'amount'            => $this->amount
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
