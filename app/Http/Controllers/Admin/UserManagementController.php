<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    /**
     * Display a listing of users with their roles.
     * Accessible by admin.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new doctor or staff user.
     * Accessible by admin.
     */
    public function create()
    {
        // Get only the roles that an admin can assign (Doctor, Staff)
        $assignableRoles = Role::whereIn('name', ['doctor', 'staff'])->get();
        return view('admin.users.create', compact('assignableRoles'));
    }

    /**
     * Store a newly created doctor or staff user in storage.
     * Accessible by admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', Rule::in(['doctor', 'staff'])], // Validate selected role
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // --- IMPORTANT: Assign the selected role (doctor or staff) ---
        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')
                         ->with('success', $request->role . ' user ' . $user->name . ' created successfully.');
    }

    /**
     * Show the form for editing a specific user's details and roles.
     * Accessible by admin.
     */
    public function edit(User $user)
    {
        // For editing, you might want to show all roles or just assignable ones
        $roles = Role::whereIn('name', ['doctor', 'staff', 'patient', 'admin'])->get(); // Include admin for potential elevation
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage, including roles.
     * Accessible by admin.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'nullable|array', // Expects an array of role names from the form
            'roles.*' => 'exists:roles,name', // Validates that submitted role names exist
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Sync roles: This is crucial for updating roles from a multi-select/checkbox form
        $user->syncRoles($request->input('roles', []));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    // You might also add a destroy method here
    // public function destroy(User $user) { ... }
}