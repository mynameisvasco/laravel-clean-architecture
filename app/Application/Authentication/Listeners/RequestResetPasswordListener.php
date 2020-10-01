<?php

namespace App\Application\Authentication\Listeners;

use App\Application\Authentication\Events\RequestResetPasswordEvent;
use App\Application\Authentication\Notifications\RequestResetPasswordNotification;
use App\Domain\Entities\ConfirmationPin;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RequestResetPasswordListener
{
    public function handle(RequestResetPasswordEvent $event)
    {
        $confirmationPin = ConfirmationPin::create([
            "pin" => Str::random(6),
            "expires_at" => Carbon::now()->addHours(12),
            "user_id" => $event->user->id
        ]);
        $notification = new RequestResetPasswordNotification($confirmationPin);
        $event->user->notify($notification);
    }
}
