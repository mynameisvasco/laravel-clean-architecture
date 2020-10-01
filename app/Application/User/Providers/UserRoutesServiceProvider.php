<?php

namespace App\Application\User\Providers;

use App\Api\Http\Controllers\UserController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class UserRoutesServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        $this->routes(fn() => Route::prefix('api/user')
            ->middleware(['api', "auth:api"])
            ->namespace($this->namespace)
            ->group(function () {
                Route::get("details", [UserController::class, "details"])->middleware(["verified"]);
            }));
    }
}
