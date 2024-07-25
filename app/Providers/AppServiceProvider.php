<?php

namespace App\Providers;

use App\Interfaces\RegistrationServiceInterface;
use App\Interfaces\AuthenticationServiceInterface;
use App\Services\RegistrationService;
use App\Services\AuthenticationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(RegistrationServiceInterface::class, RegistrationService::class);
        $this->app->bind(AuthenticationServiceInterface::class, AuthenticationService::class);
    }

    public function boot(): void
    {
        //
    }
}