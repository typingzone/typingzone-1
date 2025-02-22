<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use App\Services\RoleAndPermissionService;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Permission;
use App\Models\LoginActivity;
use Spatie\Activitylog\Models\Activity;


class UserController extends Controller
{
    protected $roleAndPermissionService;
    protected $userService;

    public function __construct(UserService $userService, RoleAndPermissionService $roleAndPermissionService)
    {
        $this->roleAndPermissionService = $roleAndPermissionService;
        $this->userService = $userService;
    }


    public function changeUserSettings(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . Auth::id(),
                'phone' => 'nullable|digits_between:8,15|unique:users,phone,' . Auth::id(),
                'password' => 'nullable|min:8|confirmed',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $this->userService->updateUserSettings($validatedData);
            return back()->with('status', 'Settings updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong.']);
        }        
    }
    

    public function handleLogin(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $result = $this->userService->login($credentials, $request);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }
    

    public function deleteLoginActivity($id)
    {
        $activity = LoginActivity::find($id);
        if ($activity) {
            $activity->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    
    public function deleteMultipleLoginActivities(Request $request)
    {
        $ids = $request->ids;
        if ($ids) {
            LoginActivity::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


    public function handlePasswordChange(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'token' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);            
            $result = $this->userService->resetPassword($validatedData);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }
    


    public function handlePasswordReset(Request $request)
    {
        try {
            $validatedData = $request->validate(['email' => 'required|email|exists:users,email']);
            $result = $this->userService->sendPasswordResetLink($validatedData);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }
    

    public function showResetForm(Request $request)
    {
        $token = $request->route('token');
        $email = $request->query('email');
        return view('auth.change_password', ['token' => $token, 'email' => $email]);
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function addRolePermission(Request $request)
    {
        return $this->roleAndPermissionService->addRolePermission($request);
    }

    public function viewEditAccessLevel(Request $request)
    {
        return $this->roleAndPermissionService->viewEditAccessLevel($request);
    }

    public function updateRolePermission(Request $request)
    {
        return $this->roleAndPermissionService->updateRolePermission($request);
    }

    public function deleteRolePermission($roleId)
    {
        try {
            $this->roleAndPermissionService->deleteRolePermission($roleId);
            return response()->json(['success' => 'Role and associated permissions deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete role and permissions.'], 500);
        }
    }
    

    public function updateUserRole(Request $request, $id)
    {
        return $this->roleAndPermissionService->updateUserRole($request, $id);
    }
    
    public function showLoginPage()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function showForgotPasswordPage()
    {
        return view('auth.forgot_password');
    }

    public function showChangePasswordPage()
    {
        return view('auth.change_password');
    }

    public function loginActivities()
    {
        $loginActivities = LoginActivity::with('user.roles')->get();
        return view('pages.others.login_activities', compact('loginActivities'));
    }
    

    public function showManageUsers()
    {
        $users = User::with('roles')->orderBy('id', 'desc')->get();
        return view('auth.manage_users', compact('users'));
    }

    public function showRolePermission()
    {
        return $this->roleAndPermissionService->getRolesPermissions();
    }
    
    
    public function storeUser(Request $request)
    {
        try {
            $validated = $request->validate([
                'profile_photo' => 'required|image|max:2048', 
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'role_id' => 'required|exists:roles,id',
            ]);
            return $this->roleAndPermissionService->storeUser($validated);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    public function getRolePermissions($role)
    {
        try {
            $role = Role::with('permissions')->findOrFail($role);
            $permissions = [];
            foreach (['Expiry Documents', 'Calendar', 'Transaction Types', 'Transaction History', 'Archived Transactions', 'Invoices', 'Documents', 'Document Names', 'Orders', 'Tools', 'Color Picker', 'Invoice Templates', 'Manage Users', 'Roles & Permissions', 'General Settings', 'Notification Preferences', 'Guide', 'Email Template', 'Reminders', 'Office Assets', 'Login Activities'] as $page) {
                $actions = $role->permissions()->where('name', 'LIKE', "$page %")->pluck('name')->toArray();
                $actions = array_map(function($action) use ($page) {
                    return str_replace($page . ' ', '', $action);
                }, $actions);
                $permissions[] = ['page' => $page, 'actions' => $actions];
            }
            return response()->json(['role' => $role, 'permissions' => $permissions]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Role not found.'.$role], 404);
        }
    }


    public function updateRolePermissions(Request $request, $roleId)
    {
        try {
            $role = Role::findOrFail($roleId);
            $role->name = $request->roleName;
            $role->save();
            $role->permissions()->detach();
            foreach ($request->permissions as $page => $actions) {
                foreach ($actions as $action) {
                    $permission = Permission::firstOrCreate(['name' => "$page $action"]);
                    $role->permissions()->attach($permission);
                }
            }    
            return redirect()->route('role-permission')->with('success', 'Role and permissions updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('role-permission')->with('error', 'Failed to update role.');
        }
    }
    

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $updated = $this->userService->updateUser($id, $request->all());
        return response()->json(['success' => $updated]);
    }

    public function destroy($id)
    {
        $deleted = $this->userService->deleteUser($id);
        return response()->json(['success' => $deleted]);
    }



    public function logActivities()
    {
        $logActivities = Activity::orderBy('created_at', 'desc')->get();
        return view('pages.others.log_activities', compact('logActivities'));
    }
    
}
