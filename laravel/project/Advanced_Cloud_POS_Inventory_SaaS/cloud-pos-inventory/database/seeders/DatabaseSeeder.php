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
        // ১. দুইটা রোল বানালাম
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // ২. একজন অ্যাডমিন বানালাম
        $admin = User::create([
            'name' => 'Admin Vai',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole); // তাকে অ্যাডমিন রোল দিলাম

        // ৩. একজন সাধারণ ইউজার বানালাম
        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($userRole); // তাকে ইউজার রোল দিলাম
    }
}
