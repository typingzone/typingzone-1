<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class RoleAndPermissionService
{
    public function addRolePermission(Request $request) {
        $roleName = "Admin ".$request->input('roleName');
        $permissions = $request->input('permissions', []);
    
        $existingRole = Role::where('name', $roleName)->where('guard_name', 'web')->first();

        if ($existingRole) {
            return redirect()->back()->with('error', 'Role already exists. Create new with different name');
        }

        $role = Role::create([
            'name' => $roleName,
            'guard_name' => 'web',
        ]);

        foreach ($permissions as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = $action;
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web'
                ]);
                if (!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            }
        }
        return redirect()->back()->with('success', 'Role and permissions added successfully.');
    }
    





    public function createCustomUser(Request $request){
        $filePath = null;
        if ($request->hasFile('profile_photo')) {
            $uploadedFile = $request->file('profile_photo');
            $randomNumber = mt_rand(10000000, 100000000);
            $fileName = $randomNumber . '.' . $uploadedFile->getClientOriginalExtension();
            $filePath = 'Super Admin Profiles/' . $fileName;
            Storage::disk('s3')->put($filePath, file_get_contents($uploadedFile), 'public');
        }
    
        // Create the SuperAdmin user
        $user = User::create([
            'name' => $request->input('userName'),
            'email' => $request->input('userEmail'),
            'password' => bcrypt($request->input('userPassword')),
            'role_id' => $request->input('userRole'),
            'profile_photo' => $fileName,
            'status' => 1,
        ]);
    
        // Assign the role to the user
        $role = Role::find($request->input('userRole'));
        if ($role) {
            $user->assignRole($role->name);
        }
    
        if ($request->has('directPermissions')) {
            foreach ($request->input('directPermissions') as $permissionName) {
                $permission = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web'
                ]);
                $user->givePermissionTo($permission);
            }
        }
    
        return redirect()->back()->with('success', 'User created, role and permissions assigned successfully.');
    }
    
    



    public function viewEditAccessLevel(Request $request){
        $roleId = Request('role_id');
        $role = Role::find($roleId);
        if ($role) {
            $permissions = $role->permissions->pluck('name')->toArray();
        } else {
            $permissions = [];
        }
        return view('edit-access-level', compact('roleId', 'role', 'permissions'));
    }





    public function updateRolePermission(Request $request){
        $request->validate([
            'roleId' => 'required|exists:roles,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'nullable|array',
            'permissions.*.*' => 'nullable|string',
        ]);
        $roleId = $request->input('roleId');
        $role = Role::findOrFail($roleId);
        $currentPermissions = $role->permissions->pluck('name')->toArray();
        $permissionsToUpdate = [];
        if ($request->has('permissions')) {
            $permissions = $request->input('permissions');

            foreach ($permissions as $page => $actions) {
                foreach ($actions as $action) {
                    $permissionName = $action;
                    $permissionsToUpdate[] = $permissionName;

                    $permission = Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);

                    if (!$role->hasPermissionTo($permission, 'web')) {
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
        foreach ($currentPermissions as $currentPermission) {
            if (!in_array($currentPermission, $permissionsToUpdate)) {
                $permission = Permission::where('name', $currentPermission)->where('guard_name', 'web')->first();
                if ($permission) {
                    $role->revokePermissionTo($permission);
                }
            }
        }
        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }



    

    public function updateUserRole(Request $request, $id){
        $user = User::find($id);
        if ($user) {
            $user->role_id = $request->role_id;
            $user->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'User not found'], 404);
    }

}