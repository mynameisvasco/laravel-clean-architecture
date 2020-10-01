<?php

namespace App\Application\Authentication\Actions;

use App\Application\Authentication\Events\RegisterEvent;
use App\Application\Common\Models\AbstractAction;
use App\Domain\Entities\User;
use App\Application\Authentication\Notifications\VerifyAccountNotification;
use App\Domain\Entities\ConfirmationPin;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

class RegisterAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $this->validate($request);
        $user = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => Hash::make($request["password"]),
            "created_ip" => $request->getClientIp(),
            "last_login_ip" => $request->getClientIp()
        ]);
        Event::dispatch(new RegisterEvent($user));
        return response()->json([
            "message" => "Account created with success, please check your email to verify your account"
        ]);
    }

    protected function validate(Request $request)
    {
        $request->validate([
            "email" => "email|required|unique:users",
            "password" => "required|min:3|max:191",
            "name" => "required|min:3|max:191"
        ]);
    }
}
