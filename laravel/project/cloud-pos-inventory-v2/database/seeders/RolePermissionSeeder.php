<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view users', 'create users', 'edit users', 'delete users',
            'view roles', 'create roles', 'edit roles', 'delete roles',
            'view companies', 'create companies', 'edit companies', 'delete companies',
            'view plans', 'create plans', 'edit plans', 'delete plans',
            'view subscriptions', 'manage subscriptions', 'view transactions',
            'view products', 'create products', 'edit products', 'delete products',
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view sales', 'create sales', 'edit sales', 'delete sales',
            'view purchases', 'create purchases', 'edit purchases', 'delete purchases',
            'view customers', 'create customers', 'edit customers', 'delete customers',
            'view suppliers', 'create suppliers', 'edit suppliers', 'delete suppliers',
            'view reports', 'view settings', 'manage settings',
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $companyAdmin = Role::firstOrCreate(['name' => 'Company Admin', 'guard_name' => 'web']);
        $companyAdmin->givePermissionTo([
            'view products', 'create products', 'edit products', 'delete products',
            'view categories', 'create categories',
            'view sales', 'create sales', 'edit sales', 'delete sales',
            'view purchases', 'create purchases',
            'view customers', 'create customers',
            'view suppliers', 'create suppliers',
            'view reports', 'view settings', 'manage settings'
        ]);

        $manager = Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'web']);
        $manager->givePermissionTo([
            'view products', 'view sales', 'create sales', 'edit sales',
            'view purchases', 'create purchases', 'view reports'
        ]);

        $salesman = Role::firstOrCreate(['name' => 'Salesman', 'guard_name' => 'web']);
        $salesman->givePermissionTo([
            'view products', 'create sales', 'view customers', 'create customers'
        ]);
    }
}