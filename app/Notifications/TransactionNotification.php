<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionNotification extends Notification
{
    use Queueable;
    private $transaction;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        //
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->transaction['client_name'])
                    ->line('amount: '.$this->transaction['amount'])
                    ->line('Admin Policy: '.$this->transaction['admin_policy'])
                    ->line('Time: '.$this->transaction['time'])
                    ->line('Transaction Id: '.$this->transaction['transaction'])
                    ->action('Check Your Inbox', url('/'))
                    ->line('Thank you for using our application!');
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'transaction_id'    => $this->transaction['transaction'], 
            'client_name'       => $this->transaction['client_name'],
            'amount'            => $this->transaction['amount'],
            'admin_policy'      => $this->transaction['admin_policy'],
            'time'              => $this->transaction['time'],
        ];
    }

}
