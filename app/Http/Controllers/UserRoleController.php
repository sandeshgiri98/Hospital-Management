<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // Assign a role to a user
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->syncRoles([$request->role]); // Remove old roles, assign new

        return response()->json([
            'message' => "Role '{$request->role}' assigned to user.",
        ]);
    }

    // Give a permission directly to user (optional)
    public function givePermission(Request $request, $userId)
    {
        $request->validate([
            'permission' => 'required|exists:permissions,name',
        ]);

        $user = User::findOrFail($userId);
        $user->givePermissionTo($request->permission);

        return response()->json([
            'message' => "Permission '{$request->permission}' given to user.",
        ]);
    }

    public function assignPermissionToRole(Request $request)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::findByName($request->role);
        $role->syncPermissions($request->permissions);

        return response()->json([
            'message' => "Permissions assigned to role '{$request->role}'.",
        ]);
    }
}
