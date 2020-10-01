<?php

namespace App\Application\Authentication\Actions;

use App\Application\Authentication\Consts\ScopeConsts;
use App\Application\Authentication\Events\LoginEvent;
use App\Application\Common\Models\AbstractAction;
use App\Domain\Entities\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class LoginAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $this->validate($request);
        $credentials = $request->only(["email", "password"]);
        $areCredentialsValid = Auth::attempt($credentials);

        if ($areCredentialsValid) {
            $user = User::where('email', $credentials["email"])->first();
            $tokenResult = $user->createToken(env("APP_NAME"), ScopeConsts::roleScopes[$user->role]);
            $user->last_login_ip = $request->getClientIp();
            $user->last_login_at = Carbon::now();
            $user->save();
            Event::dispatch(new LoginEvent($user));
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }

        return response()->json(["message" => "Provided credentials do not match any record"], 403);
    }

    protected function validate(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required|min:3",
        ]);
    }
}
