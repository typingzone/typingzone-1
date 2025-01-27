<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use App\Services\RoleAndPermissionService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class UserController extends Controller
{
    protected $roleAndPermissionService;

    public function __construct(RoleAndPermissionService $roleAndPermissionService)
    {
        $this->roleAndPermissionService = $roleAndPermissionService;
    }

    public function changeUserSettings(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|digits_between:8,15|unique:users,phone,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo); 
            }
    
            $fileName = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $fileName;
        }
        $user->save();
        return back()->with('status', 'Settings updated successfully.');
    }
    

    

    public function handleLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return response()->json(['success' => true, 'role' => 'admin']);
            } elseif ($user->hasRole('user')) {
                return response()->json(['success' => true, 'role' => 'user']);
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials']);
    }
    



    public function handlePasswordChange(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
    
        // Attempt to reset the password using the provided token and email
        $status = Password::reset(
            $request->only('email', 'token', 'new_password'),
            function ($user) use ($request) {
                $user->password = bcrypt($request->new_password);
                $user->save();
            }
        );
    
        // Check the result of the password reset attempt
        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['success' => true, 'message' => 'Password successfully changed.']);
        } else {
            return response()->json(['success' => false, 'message' => __($status)]);
        }
    }
    

    public function handlePasswordReset(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['success' => true, 'message' => 'Password reset link sent to your email.']);
        } else {
            return response()->json(['success' => false, 'message' => __($status)]);
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


    public function updateUserRole(Request $request, $id)
    {
        return $this->roleAndPermissionService->updateUserRole($request, $id);
    }
    
    public function showLoginPage()
    {
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
        return view('pages.others.login_activities');
    }

    

}
