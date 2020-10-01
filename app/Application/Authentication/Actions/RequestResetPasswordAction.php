<?php

namespace App\Application\Authentication\Actions;

use App\Application\Authentication\Events\RequestResetPasswordEvent;
use App\Application\Common\Models\AbstractAction;
use App\Domain\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class RequestResetPasswordAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $user = User::find(Auth::user()->id);
        Event::dispatch(new RequestResetPasswordEvent($user));
        return response()->json(["message" => "We sent a code to your email to confirm password reset."]);
    }

    protected function validate(Request $request)
    {

    }
}
