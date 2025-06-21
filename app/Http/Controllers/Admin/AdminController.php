<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;  // <-- Import Role here

class AdminController extends Controller
{
    public function makeAdmin()
    {
        Role::firstOrCreate(['name' => 'admin']);

        $user = User::firstOrCreate(
            ['email' => 'adminone@gmail.com'],  // Find by email
            [
                'name' => 'Super Admin',
                'phone' => '9839485869',
                'password' => Hash::make('password123'),
            ]
        );

        $user->assignRole('admin');

        return "Admin created!";
    }
}
