<?php

namespace App\Application\Authentication\Providers;

use App\Api\Http\Controllers\AuthenticationController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class AuthenticationRoutesServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        $this->routes(fn() => Route::prefix('api/auth')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(function () {
                Route::post("login", [AuthenticationController::class, "login"]);
                Route::post("register", [AuthenticationController::class, "register"]);
                Route::middleware(["auth:api"])->group(function () {
                    Route::post("verify", [AuthenticationController::class, "verify"]);
                    Route::get("logout", [AuthenticationController::class, "logout"]);
                    Route::post("resetPassword", [AuthenticationController::class, "resetPassword"]);
                    Route::get("requestResetPassword", [AuthenticationController::class, "requestResetPassword"]);
                });
            }));
    }
}

