<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Plan;
use App\Models\Subscription;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ১. প্ল্যান সিডার কল করা
        $this->call(PlanSeeder::class);

        // ২. রোল তৈরি
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $companyAdminRole = Role::firstOrCreate(['name' => 'Company Admin']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager']);
        $salesmanRole = Role::firstOrCreate(['name' => 'Salesman']);

        // ৩. Super Admin (SaaS এর মালিক - এর company_id NULL থাকবে, যা স্বাভাবিক)
        $superAdmin = User::create([
            'name' => 'Khondoker Moin Hossain',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->assignRole($superAdminRole);

        // ৪. Company Admin (দোকান মালিক)
        $companyAdmin = User::create([
            'name' => 'Shop Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $companyAdmin->assignRole($companyAdminRole);

        // ৫. Manager এবং Salesman তৈরি
        $manager = User::create([
            'name' => 'Branch Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $manager->assignRole($managerRole);

        $salesman = User::create([
            'name' => 'Cashier',
            'email' => 'salesman@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $salesman->assignRole($salesmanRole);

        // ৬. কোম্পানি তৈরি (Company Admin কে মালিক হিসেবে সেট করা)
        $freeTrialPlan = Plan::where('slug', 'free-trial')->first();
        
        $company = Company::create([
            'name' => 'Demo Super Shop',
            'email' => 'demo@shop.com',
            'user_id' => $companyAdmin->id, 
            'plan_id' => $freeTrialPlan->id, 
            'status' => 'trial',
            'trial_ends_at' => now()->addDays(14),
        ]);

        // ==========================================
        // 🌟 সবচেয়ে গুরুত্বপূর্ণ ধাপ (যা আগে মিসিং ছিল)
        // ==========================================
        // কোম্পানি তৈরি হওয়ার পর, এই কোম্পানির অধীনে থাকা ইউজারদের company_id আপডেট করা
        $companyAdmin->update(['company_id' => $company->id]);
        $manager->update(['company_id' => $company->id]);
        $salesman->update(['company_id' => $company->id]);
        // (Super Admin এর company_id NULL থাকবে, কারণ তিনি SaaS এর মালিক)


        // ৭. কোম্পানির জন্য সাবস্ক্রিপশন তৈরি
        Subscription::create([
            'company_id' => $company->id,
            'plan_id' => $freeTrialPlan->id,
            'status' => 'trial',
            'started_at' => now(),
            'trial_ends_at' => now()->addDays(14),
            'ends_at' => now()->addDays(14),
        ]);
    }
}