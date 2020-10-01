<?php

namespace App\Application\Common\Providers;

use App\Application\Authentication\Providers\AuthenticationServiceProvider;
use App\Application\User\Providers\UserServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthenticationServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
    }
}
