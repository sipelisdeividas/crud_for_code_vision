<?php

namespace App\Providers;

use App\Interfaces\ProductPriceServiceInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ProductServiceInterface;
use App\Interfaces\RegistrationServiceInterface;
use App\Interfaces\AuthenticationServiceInterface;
use App\Repositories\ProductRepository;
use App\Services\Helpers\PriceClassifier;
use App\Services\ProductPriceService;
use App\Services\ProductService;
use App\Services\RegistrationService;
use App\Services\AuthenticationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(RegistrationServiceInterface::class, RegistrationService::class);

        $this->app->bind(AuthenticationServiceInterface::class, AuthenticationService::class);

        $this->app->bind(ProductServiceInterface::class, ProductService::class);

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->singleton(PriceClassifier::class);

        $this->app->singleton(ProductPriceServiceInterface::class, function ($app)
        {
            return new ProductPriceService($app->make(PriceClassifier::class));
        });
    }

    public function boot(): void
    {
    }
}