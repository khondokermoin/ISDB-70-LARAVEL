<?php

namespace App\Providers;

use App\Models\Company;
use App\Observers\CompanyObserver;
use App\Services\TenantService;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind TenantService as a singleton so the same instance is used
        // throughout the entire request lifecycle.
        // IdentifyTenantByDomain middleware resolves the tenant once,
        // and HandleInertiaRequests reads it from the same instance.
        $this->app->singleton(TenantService::class, function () {
            return new TenantService();
        });
    }

    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        // Register Company observer for automated tenant provisioning
        Company::observe(CompanyObserver::class);
    }
}
