<?php


namespace App\Application\User\Providers;


use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(UserRoutesServiceProvider::class);
    }
}
