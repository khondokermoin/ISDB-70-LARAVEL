<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('packages')->insert([
            ['package_id' => 1, 'name' => 'MINOR+', 'type' => 'home', 'features' => null, 'speed_mbps' => 20, 'quota_gb' => 9999, 'price' => 500.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 2, 'name' => 'JUNIOR+', 'type' => 'home', 'features' => null, 'speed_mbps' => 30, 'quota_gb' => 9999, 'price' => 650.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 3, 'name' => 'LEARNER+', 'type' => 'home', 'features' => null, 'speed_mbps' => 50, 'quota_gb' => 9999, 'price' => 800.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 4, 'name' => 'BASIC+', 'type' => 'home', 'features' => null, 'speed_mbps' => 100, 'quota_gb' => 9999, 'price' => 1000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 5, 'name' => 'PRIMARY+', 'type' => 'home', 'features' => null, 'speed_mbps' => 125, 'quota_gb' => 9999, 'price' => 1200.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 6, 'name' => 'DOMINANT+', 'type' => 'home', 'features' => null, 'speed_mbps' => 150, 'quota_gb' => 9999, 'price' => 1500.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 7, 'name' => 'CONFIDENT+', 'type' => 'home', 'features' => null, 'speed_mbps' => 200, 'quota_gb' => 9999, 'price' => 2000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 8, 'name' => 'POSITIVE+', 'type' => 'home', 'features' => null, 'speed_mbps' => 250, 'quota_gb' => 9999, 'price' => 2500.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 17, 'name' => 'CORPORATE STARTER', 'type' => 'corporate', 'features' => 'Static IP, Priority Support', 'speed_mbps' => 50, 'quota_gb' => null, 'price' => 3000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 18, 'name' => 'CORPORATE BASIC', 'type' => 'corporate', 'features' => '1 Static IP, SLA', 'speed_mbps' => 100, 'quota_gb' => null, 'price' => 4000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 19, 'name' => 'CORPORATE PLUS', 'type' => 'corporate', 'features' => 'Dedicated Support', 'speed_mbps' => 150, 'quota_gb' => null, 'price' => 6000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 20, 'name' => 'CORPORATE PRO', 'type' => 'corporate', 'features' => '2 Static IPs', 'speed_mbps' => 200, 'quota_gb' => null, 'price' => 8000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 21, 'name' => 'CORPORATE PREMIUM', 'type' => 'corporate', 'features' => 'Dedicated bandwidth', 'speed_mbps' => 300, 'quota_gb' => null, 'price' => 12000.00, 'duration_days' => 30, 'status' => 'active'],
            ['package_id' => 22, 'name' => 'ENTERPRISE', 'type' => 'corporate', 'features' => 'SLA + Dedicated line', 'speed_mbps' => 0, 'quota_gb' => null, 'price' => 0.00, 'duration_days' => 30, 'status' => 'active'],
        ]);
    }
}
