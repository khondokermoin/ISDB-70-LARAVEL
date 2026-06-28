<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =====================================
        // 1. Admin Account
        // =====================================
        User::create([
            'name' => 'Khondoker Moin Hossain',
            'email' => 'admin@amarit.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@amarit.com'),
            'role' => 'admin',
            'phone' => '01711000000',
            'address' => 'Jigatola, Dhaka',
            'status' => 'active',
        ]);

        // =====================================
        // 2. All Staff Accounts
        // =====================================
        User::create([
            'name' => 'Rahim',
            'designation' => 'Field Technician',
            'email' => 'rahim@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('rahim@gmail.com'),
            'role' => 'staff',
            'phone' => '01647655555',
            'address' => 'Dhanmondi 15',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Karim',
            'designation' => 'Network Engineer',
            'email' => 'karim@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('karim@gmail.com'),
            'role' => 'staff',
            'phone' => '01647666666',
            'address' => 'Dhaka',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Salam',
            'designation' => 'Billing Manager',
            'email' => 'salam@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salam@gmail.com'),
            'role' => 'staff',
            'phone' => '01647777777',
            'address' => 'Dhaka',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Rakib',
            'designation' => 'Customer Support',
            'email' => 'rakib@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('rakib@gmail.com'),
            'role' => 'staff',
            'phone' => '01648888888',
            'address' => 'Dhaka',
            'status' => 'active',
        ]);

        // =====================================
        // 3. Customer Accounts
        // =====================================
        User::create([
            'name' => 'KHONDOKER MOIN HOSSAIN',
            'email' => 'comt-2005131@dti.ac',
            'email_verified_at' => now(),
            'password' => Hash::make('comt-2005131@dti.ac'),
            'role' => 'customer',
            'phone' => '01647615608',
            'address' => 'Dhaka',
            'status' => 'active',
        ]);

        // Test Customers from SQL
        User::create([
            'name' => 'Test Suspended',
            'email' => 'suspended@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('suspended@test.com'),
            'role' => 'customer',
            'phone' => '01700000101',
            'address' => 'Dhaka',
            'status' => 'suspended',
        ]);

        User::create([
            'name' => 'Test 1 Day Left',
            'email' => '1day@test.com',
            'password' => Hash::make('1day@test.com'),
            'email_verified_at' => now(),
            'role' => 'customer',
            'phone' => '01700000102',
            'address' => 'Dhaka',
            'status' => 'active',
        ]);
    }
}
