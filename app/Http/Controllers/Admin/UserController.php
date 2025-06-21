<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // Get all available roles
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'nullable|array', // Expects an array of role names or IDs
            'roles.*' => 'exists:roles,name', // Validate each role name
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Sync roles: This will remove any roles the user currently has
        // that are not in the $request->roles array, and add new ones.
        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }
}
