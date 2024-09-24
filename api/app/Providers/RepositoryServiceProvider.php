<?php

namespace App\Providers;

use App\Interface\Repository\CustomerRepositoryInterface;
use App\Interface\Repository\ProductCategoryRepositoryInterface;
use App\Interface\Repository\ProductRepositoryInterface;
use App\Interface\Repository\SupplierRepositoryInterface;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Service\AuthenticationServiceInterface;
use App\Interface\Service\CustomerServiceInterface;
use App\Interface\Service\ProductCategoryServiceInterface;
use App\Interface\Service\ProductServiceInterface;
use App\Interface\Service\SupplierServiceInterface;
use App\Interface\Service\UserServiceInterface;
use App\Repository\CustomerRepository;
use App\Repository\ProductRepository;
use App\Repository\SupplierRepository;
use App\Repository\UserRepository as RepositoryUserRepository;
use App\Service\AuthService;
use App\Service\CustomerService;
use App\Service\ProductCategoryService;
use App\Service\ProductService;
use App\Service\SupplierService;
use Illuminate\Support\ServiceProvider;
use UserService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Repository
        $this->app->bind(UserRepositoryInterface::class, RepositoryUserRepository::class);
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepositoryInterface::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);

        //Service
        $this->app->bind(AuthenticationServiceInterface::class, AuthService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProductCategoryServiceInterface::class, ProductCategoryService::class);
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(SupplierServiceInterface::class, SupplierService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
