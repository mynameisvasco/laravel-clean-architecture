<?php

namespace App\Application\Authentication\Notifications;

use App\Domain\Entities\ConfirmationPin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyAccountNotification extends Notification
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
            ->line('One last step to start using your account.')
            ->line('Your code is '.$this->confirmationPin->pin)
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
