<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        // $setting = NotificationSetting::where('name','volume_alert')->first();
        // $destination = [];
        // if($setting->sms && $notifiable->sms_notify && $notifiable->mobile) $destination[] = 'nexmo';
        // if($setting->email && $notifiable->email_notify)  $destination[] = 'mail';
        // if($setting->app) $destination[] = 'database';
        // $destination[] = 'broadcast';
        // return $destination;
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Thank you for signing up')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
