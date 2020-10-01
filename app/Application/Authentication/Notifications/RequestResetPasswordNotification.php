<?php

namespace App\Application\Authentication\Notifications;

use App\Domain\Entities\ConfirmationPin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestResetPasswordNotification extends Notification
{
    use Queueable;

    public ConfirmationPin $confirmationPin;

    public function __construct(ConfirmationPin $confirmationPin)
    {
        $this->confirmationPin = $confirmationPin;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Seems like you request a password reset.')
            ->line('Your code is '.$this->confirmationPin->pin)
            ->line('If you did not ask for this just ignore this message.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
