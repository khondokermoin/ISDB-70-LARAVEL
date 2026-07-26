<?php

namespace App\Observers;

use App\Models\Company;
use App\Services\TenantProvisioningService;

class CompanyObserver
{
    public function created(Company $company): void
    {
        resolve(TenantProvisioningService::class)->provision($company);
    }
}
