<?php

namespace App\Application\Authentication\Listeners;

use App\Application\Authentication\Events\RegisterEvent;
use App\Application\Authentication\Notifications\VerifyAccountNotification;
use App\Domain\Entities\ConfirmationPin;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VerifyAccountListener
{
    public function handle(RegisterEvent $event)
    {
        $confirmationPin = ConfirmationPin::create([
            "pin" => Str::random(6),
            "expires_at" => Carbon::now()->addHours(12),
            "user_id" => $event->user->id
        ]);
        $notification = new VerifyAccountNotification($confirmationPin);
        $event->user->notify($notification);
    }
}
