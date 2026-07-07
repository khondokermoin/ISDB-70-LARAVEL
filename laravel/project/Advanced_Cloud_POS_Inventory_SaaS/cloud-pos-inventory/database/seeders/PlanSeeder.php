<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create(['name' => 'Starter', 'price' => 500, 'max_users' => 2, 'max_products' => 300]);
        Plan::create(['name' => 'Business', 'price' => 1000, 'max_users' => 5, 'max_products' => 1500]);
    }
}
