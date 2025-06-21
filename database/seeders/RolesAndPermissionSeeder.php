<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions (example permissions for a hospital system)
        Permission::firstOrCreate(['name' => 'view dashboard']);
        Permission::firstOrCreate(['name' => 'manage doctors']);
        Permission::firstOrCreate(['name' => 'view patients']);
        Permission::firstOrCreate(['name' => 'manage patients']);
        Permission::firstOrCreate(['name' => 'manage appointments']);
        Permission::firstOrCreate(['name' => 'view medical records']);
        Permission::firstOrCreate(['name' => 'edit medical records']);
        Permission::firstOrCreate(['name' => 'manage users']); // For admin
        Permission::firstOrCreate(['name' => 'manage roles']); // For admin
        Permission::firstOrCreate(['name' => 'access staff area']);

        // Roles and Permission for admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin gets all permissions

        // Roles and Permission for doctor
        $doctorRole = Role::firstOrCreate(['name' => 'doctor']);
        $doctorRole->givePermissionTo([
            'view dashboard',
            'view patients',
            'view medical records',
            'edit medical records',
            'manage appointments',
        ]);

        // Roles and Permission for patient
        $patientRole = Role::firstOrCreate(['name' => 'patient']);
        $patientRole->givePermissionTo([
            'view dashboard',
            'view medical records',
            'manage appointments',
        ]);

        // Roles and Permission for staff
        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $staffRole->givePermissionTo([
            'view dashboard',
            'view patients',
            'manage appointments',
            'access staff area',
        ]);

        // You can also assign roles to existing users here, for example:
        // $user = \App\Models\User::find(1);
        // $user->assignRole('admin');
    }
}
