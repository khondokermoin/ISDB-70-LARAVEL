<?php

namespace App\Observers;

use App\Models\Company;
use App\Services\TenantProvisioningService;

class CompanyObserver
{
    public function created(Company $company): void
    {
        (new TenantProvisioningService())->provisionNewCompany($company);
    }
}
