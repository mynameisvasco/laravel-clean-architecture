<?php

namespace App\Application\Authentication\Events;

use App\Domain\Entities\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RegisterEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
