<?php

namespace App\Notifications;

use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $payment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($notifiable->email_notify)
        return ['mail'];
    }

    public function status($status){
        if($status == "success")
        $message = 'was successful. Your order is currently being processed';
        else $message = 'has failed. You may retry the transaction from your dashboard.';
        return $message;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Payment of '.$this->payment->amount.' for meals ordered '.$this->status($this->payment->status))
                    ->line('Thank you for your patronage!');
    }

    
    public function toArray($notifiable)
    {
        return [
            'message' => 'Payment of '.$this->payment->amount.' for meals ordered '.$this->status($this->payment->status),
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content('Transaction of '.$this->payment->amount.' for meals ordered '.$this->status($this->payment->status));
    }
}
