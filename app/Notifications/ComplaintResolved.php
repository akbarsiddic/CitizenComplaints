<?php

namespace App\Notifications;

use Illuminate\Support\Facades\URL;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintResolved extends Notification
{
    use Queueable;

    protected $complaint;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($complaint)
    {
        //
        $this->complaint = $complaint;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/complaint/' . $this->complaint->id);

        return (new MailMessage())
            ->line('Your complaint has been resolved.')
            ->line('You can now come to the site to add a comment about it.')
            ->line(
                'If we do not receive further information from you within 24 hours, we will close the complaint.'
            )
            ->action('View Complaint', $url);
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
                //
            ];
    }
}
