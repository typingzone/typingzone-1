<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use App\Services\RoleAndPermissionService;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $roleAndPermissionService;

    public function __construct(RoleAndPermissionService $roleAndPermissionService)
    {
        $this->roleAndPermissionService = $roleAndPermissionService;
    }

    public function changeUserSettings(Request $request)
    {
        $user = auth()->user();
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);    
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate(); 
    
            return redirect()->intended('dashboard'); 
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); 
    }
    


    public function handlePasswordChange(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Your current password is incorrect.',
            ]);
        }    
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();     
        return redirect()->route('dashboard')->with('status', 'Password successfully changed.');
    }
    

    public function handlePasswordReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999);
        $user->otp = Hash::make($otp); 
        $user->otp_created_at = now(); 
        $user->save();
        Mail::to($user->email)->send(new PasswordResetMail($otp));
        return back()->with('status', 'An OTP has been sent to your email. Please use it to reset your password.');
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



}
