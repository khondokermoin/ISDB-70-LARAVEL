<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Company;
use App\Models\Customer;
use App\Models\GlobalTax;
use App\Models\GlobalUnit;

class TenantProvisioningService
{
    public function provision(Company $company): void
    {
        $this->createDefaultUnits($company);
        $this->createDefaultTaxes($company);
        $this->createDefaultCustomer($company);
        $this->createDefaultAttributes($company);
    }

    protected function createDefaultUnits(Company $company): void
    {
        $units = [
            ['name' => 'Pcs', 'short_code' => 'Pcs'],
            ['name' => 'Kg', 'short_code' => 'Kg'],
            ['name' => 'Ltr', 'short_code' => 'Ltr'],
            ['name' => 'Box', 'short_code' => 'Box'],
        ];

        foreach ($units as $unit) {
            GlobalUnit::query()->create([
                'company_id' => $company->id,
                'name' => $unit['name'],
                'short_code' => $unit['short_code'],
                'is_active' => true,
            ]);
        }
    }

    protected function createDefaultTaxes(Company $company): void
    {
        $taxes = [
            ['name' => 'No VAT', 'rate' => 0],
            ['name' => 'Standard VAT', 'rate' => 5],
        ];

        foreach ($taxes as $tax) {
            GlobalTax::query()->create([
                'company_id' => $company->id,
                'name' => $tax['name'],
                'rate' => $tax['rate'],
                'is_active' => true,
            ]);
        }
    }

    protected function createDefaultCustomer(Company $company): void
    {
        Customer::query()->create([
            'company_id' => $company->id,
            'name' => 'Walk-in Customer',
            'phone' => 'N/A',
            'email' => null,
            'is_walk_in' => true,
        ]);
    }

    protected function createDefaultAttributes(Company $company): void
    {
        $businessTypeName = $company->businessType->name ?? '';

        $defaultAttributes = [];

        $normalizedBusinessType = trim(strtolower($businessTypeName));

        if (str_contains($normalizedBusinessType, 'fashion')) {
            $defaultAttributes = [
                ['name' => 'Size', 'values' => ['S', 'M', 'L', 'XL']],
                ['name' => 'Color', 'values' => ['Black', 'White', 'Red']],
            ];
        } elseif (str_contains($normalizedBusinessType, 'electronics')) {
            $defaultAttributes = [
                ['name' => 'RAM', 'values' => ['4GB', '8GB', '16GB']],
                ['name' => 'Storage', 'values' => ['64GB', '128GB', '256GB']],
            ];
        } elseif (str_contains($normalizedBusinessType, 'restaurant')) {
            $defaultAttributes = [
                ['name' => 'Portion', 'values' => ['Regular', 'Large', 'Family']],
            ];
        } elseif (str_contains($normalizedBusinessType, 'retail') || str_contains($normalizedBusinessType, 'grocery') || str_contains($normalizedBusinessType, 'general')) {
            $defaultAttributes = [
                ['name' => 'Weight/Volume', 'values' => ['100g', '250g', '500g', '1Kg', '5Kg']],
                ['name' => 'Pack Size', 'values' => ['Single', 'Half Dozen', 'Dozen', 'Family Pack']],
            ];
        }

        foreach ($defaultAttributes as $attributeData) {
            $attribute = Attribute::query()->create([
                'company_id' => $company->id,
                'name' => $attributeData['name'],
            ]);

            foreach ($attributeData['values'] as $value) {
                AttributeValue::query()->create([
                    'attribute_id' => $attribute->id,
                    'value' => $value,
                ]);
            }
        }
    }
}
