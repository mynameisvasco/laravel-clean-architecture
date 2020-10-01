<?php

namespace App\Application\Authentication\Actions;

use App\Application\Common\Models\AbstractAction;
use App\Domain\Entities\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyAccountAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $this->validate($request);
        $pin = Auth::user()->confirmationPins()->where("pin", $request["pin"])->firstOrFail();
        if ($pin->expires_at->isPast()) {
            return response()->json(["message" => "Provided confirmation pin is invalid or no longer valid."], 403);
        }
        $pin->expires_at = Carbon::now();
        $pin->save();
        $user = User::find(Auth::user()->id);
        $user->email_verified_at = Carbon::now();
        $user->save();
        return response()->json(["message" => "Your account was verified with success, you can login now."]);
    }

    protected function validate(Request $request)
    {
        $request->validate([
            "pin" => "required"
        ]);
    }
}
