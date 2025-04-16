<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommissionReward extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $amount;
    public $accountName;
    public $accountNumber;
    public $bank;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $amount,  $accountName, $accountNumber, $bank)
    {
        //
        $this->name = $name;
        $this->amount = $amount;
        $this->accountName = $accountName;
        $this->accountNumber = $accountNumber;
        $this->bank = $bank;
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
            subject: 'Affiliate Commission on its Way🥳',
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
            markdown: 'emails.commisions.rewards',
            with: [
                'name'              => $this->name,
                'amount'            => $this->amount,
                'accountName'       => $this->accountName,
                'accountNumber'     => $this->accountNumber,
                'bank'              => $this->bank,
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
