<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ১. SaaS প্রজেক্টের রিয়েল-ওয়ার্ল্ড রোল তৈরি
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $companyAdminRole = Role::firstOrCreate(['name' => 'Company Admin']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager']);
        $salesmanRole = Role::firstOrCreate(['name' => 'Salesman']);

        // ২. Super Admin (সিস্টেম মালিক)
        $superAdmin = User::create([
            'name' => 'Khondoker Moin Hossain',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->assignRole($superAdminRole);

        // ৩. Company Admin (দোকান মালিক)
        $companyAdmin = User::create([
            'name' => 'Shop Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $companyAdmin->assignRole($companyAdminRole);

        // ৪. Manager (ব্রাঞ্চ ম্যানেজার)
        $manager = User::create([
            'name' => 'Branch Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $manager->assignRole($managerRole);

        // ৫. Salesman (ক্যাশিয়ার/সেলসম্যান)
        $salesman = User::create([
            'name' => 'Cashier',
            'email' => 'salesman@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $salesman->assignRole($salesmanRole);
    }
}