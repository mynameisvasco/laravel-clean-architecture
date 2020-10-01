<?php

namespace App\Api\Http\Controllers;

use App\Application\Authentication\Actions\LoginAction;
use App\Application\Authentication\Actions\LogoutAction;
use App\Application\Authentication\Actions\RegisterAction;
use App\Application\Authentication\Actions\RequestResetPasswordAction;
use App\Application\Authentication\Actions\ResetPasswordAction;
use App\Application\Authentication\Actions\VerifyAccountAction;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        return (new LoginAction())($request);
    }

    public function register(Request $request)
    {
        return (new RegisterAction())($request);
    }

    public function verify(Request $request)
    {
        return (new VerifyAccountAction())($request);
    }

    public function requestResetPassword(Request $request)
    {
        return (new RequestResetPasswordAction())($request);
    }

    public function resetPassword(Request $request)
    {
        return (new ResetPasswordAction())($request);
    }

    public function logout(Request $request)
    {
        return (new LogoutAction())($request);
    }
}
