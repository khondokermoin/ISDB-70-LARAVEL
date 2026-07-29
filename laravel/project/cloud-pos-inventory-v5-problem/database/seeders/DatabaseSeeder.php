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
        // 1. Ensure foundational data
        $this->call(PlanSeeder::class);
        $this->call(RolePermissionSeeder::class);

        // 2. Core seeders
        $this->call(SuperAdminSeeder::class);
        $this->call(DemoCompanySeeder::class);

        // 3. Optional master data
        $this->call([
            CategorySeeder::class,
            BusinessTypeSeeder::class,
        ]);

        // 4. Dummy tenant data for testing
        $this->call(DummyTenantSeeder::class);
        $this->call(DummyProductSeeder::class);

        $this->command->info('Database seeding completed successfully!');
    }
}