<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Usa una vista personalizzata per l'email di reset password.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Reset della tua password') 
            ->view('emails.password-reset', [
                'token' => $this->token,
                'user' => $notifiable
            ]);
    }
}