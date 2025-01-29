<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Services\RoleAndPermissionService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserService
{

    public function updateUserSettings($data)
    {
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        if (isset($data['profile_photo'])) {
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }
            $fileName = $data['profile_photo']->store('profile_photos', 'public');
            $user->profile_photo = $fileName;
        }
        $user->save();
    }





    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return ['success' => true, 'role' => 'admin'];
            } elseif ($user->hasRole('user')) {
                return ['success' => true, 'role' => 'user'];
            }
            return ['success' => true];
        }
        return ['success' => false, 'message' => 'Invalid credentials'];
    }




    public function resetPassword($data)
    {
        $status = Password::reset(
            $data,
            function ($user) use ($data) {
                $user->password = bcrypt($data['new_password']);
                $user->save();
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            return ['success' => true, 'message' => 'Password successfully changed.'];
        }
        return ['success' => false, 'message' => __($status)];
    }




    public function sendPasswordResetLink($data)
    {
        $status = Password::sendResetLink($data);
        if ($status === Password::RESET_LINK_SENT) {
            return ['success' => true, 'message' => 'Password reset link sent to your email.'];
        }
        return ['success' => false, 'message' => __($status)];
    }


}