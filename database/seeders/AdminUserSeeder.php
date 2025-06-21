<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{

    public function run(): void
    {
        // Create a default admin user if one doesn't exist
        $adminUser = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL')],
            [
                'name' => 'Super Admin',
                'phone' => env('ADMIN_PHONE', '9800000000'),
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'email_verified_at' => now(),
            ]
        );

        // Assign the 'admin' role to this user
        // Ensure the 'admin' role exists in your database.
        // It should be created by RolesAndPermissionsSeeder.
        $adminUser->assignRole('admin');

        $this->command->info('Admin user created/updated: ' . $adminUser->email);
    }
}
