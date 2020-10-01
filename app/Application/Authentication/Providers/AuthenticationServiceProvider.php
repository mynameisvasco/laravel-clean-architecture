<?php

namespace App\Application\Authentication\Providers;

use App\Application\Authentication\Consts\ScopeConsts;
use Illuminate\Auth\AuthServiceProvider;
use Laravel\Passport\Passport;

class AuthenticationServiceProvider extends AuthServiceProvider
{
    public function register()
    {
        $this->app->register(AuthenticationEventServiceProvider::class);
        $this->app->register(AuthenticationRoutesServiceProvider::class);
    }

    public function boot()
    {
        Passport::routes();
        Passport::tokensCan(ScopeConsts::allScopes);
    }
}
