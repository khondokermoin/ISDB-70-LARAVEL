<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@system.com';
        $user = User::firstOrCreate([
            'email' => $email,
        ], [
            'name' => 'System Admin',
            'password' => Hash::make('password'),
        ]);

        if (method_exists($user, 'assignRole')) {
            $user->assignRole('Super Admin');
        }
    }
}
