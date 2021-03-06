<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $order;
    
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    
    public function via($notifiable)
    {
        if($notifiable->email_notify)
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        $word = $this->message($this->order->status);
        return (new MailMessage)
                    ->subject('Order '.$this->order->status)
                    ->line($word)
                    ->action('View order', route('order.view',$this->order))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message($this->order->status),
            'url'=> route('order.view',$this->order)
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content($this->message($this->order->status));
    }

    public function message($status){
        $word = '';
        switch($status){
            case 'cancelled': $word = 'Order with order number '.$this->order->id.' was cancelled';
            break;
            case 'finished': $word = 'Your meals with order number '.$this->order->id.' are ready and on the way to you';
            break;
            case 'delivered': $word = 'Your meals with order number '.$this->order->id.' has been delivered';
            break;
        }
        return $word;
    }
}

