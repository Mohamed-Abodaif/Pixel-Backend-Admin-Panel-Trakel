<?php

namespace App\Providers;

use App\Services\Repositries\RepositryInterfaces\TenantCompanyPackageRepositryInterface;
use App\Services\Repositries\RepositryInterfaces\TenantCompanyRepostiryInterface;
use App\Services\Repositries\RepositryTypes\PackageRepository;
use App\Services\Repositries\RepositryTypes\TenantCompanyRepostiry;
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
        $this->registerTenantCompanyRepostiryInterface();

        $this->registerTenantCompanyPackageRepositryInterface();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function registerTenantCompanyPackageRepositryInterface() : void
    {
        $this->app->singleton(TenantCompanyPackageRepositryInterface::class , PackageRepository::class);
    }
    
    protected function registerTenantCompanyRepostiryInterface() : void
    {
        $this->app->singleton(TenantCompanyRepostiryInterface::class , TenantCompanyRepostiry::class);
    }
}
