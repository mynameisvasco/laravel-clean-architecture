<?php

namespace App\Application\Authentication\Actions;

use App\Application\Common\Models\AbstractAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        Auth::user()->token()->revoke();
        return response()->json(["message" => "Logged out with success."]);
    }

    protected function validate(Request $request)
    {
    }
}
