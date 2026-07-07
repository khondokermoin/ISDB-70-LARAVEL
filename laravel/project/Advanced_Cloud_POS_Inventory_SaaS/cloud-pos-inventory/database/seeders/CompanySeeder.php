<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Plan;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $plan = Plan::where('name', 'Business')->first();

        Company::create([
            'name' => 'Fashion BD (Demo Shop)',
            'email' => 'contact@fashionbd.com',
            'phone' => '01711000000',
            'address' => 'Dhaka, Bangladesh',
            'plan_id' => $plan->id, // বিজনেস প্ল্যানের সাথে যুক্ত হলো
            'status' => 'active',
        ]);
    }
}
