<?php

namespace App\Services;

use App\Models\Company;
use App\Models\GlobalUnit;
use App\Models\GlobalTax;
use App\Models\Customer;
use Illuminate\Support\Arr;

class TenantProvisioningService
{
    public function provisionNewCompany(Company $company): void
    {
        // Create default units
        $units = ['Kg', 'Pcs', 'Ltr'];
        foreach ($units as $unit) {
            GlobalUnit::create([
                'company_id' => $company->id,
                'name' => $unit,
                'short_name' => $unit,
            ]);
        }

        // Create default taxes
        $taxes = [
            ['name' => 'VAT 0%', 'rate' => 0],
            ['name' => 'VAT 5%', 'rate' => 5],
        ];
        foreach ($taxes as $t) {
            GlobalTax::create([
                'company_id' => $company->id,
                'name' => $t['name'],
                'rate' => $t['rate'],
            ]);
        }

        // Create default walk-in customer
        Customer::create([
            'company_id' => $company->id,
            'name' => 'Walk-in Customer',
            'email' => null,
            'phone' => null,
            'is_walk_in' => true,
        ]);
    }
}
