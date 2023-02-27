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
            ->action('View Complaint', $url)
            ->line(
                'If you are satisfied with the resolution, please click the button below to close the complaint.'
            )
            ->action('Close Complaint', $url . '/close')
            ->line(
                'If you are not satisfied with the resolution, please click the button below to deny the complaint.'
            )
            ->action('Deny Complaint', $url . '/deny')
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
                //
            ];
    }
}
