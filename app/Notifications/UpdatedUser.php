<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class UpdatedUser extends Notification
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
        return ['slack'];
    }
    
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->success()
            ->from('ASK Publishing')
            ->content("$notifiable->name has updated his/her profile!")
            ->attachment(function ($attachment) use($notifiable) {
                $attachment->fields([
                                'Name' => $notifiable->name,
                                'email' => $notifiable->email,
                            ]);
            });
    }
}
