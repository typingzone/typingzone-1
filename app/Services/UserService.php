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
use Jenssegers\Agent\Agent;
use App\Models\LoginActivity;

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
                $oldPhotoPath = public_path($user->profile_photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $folderName = 'build/profile_photos';
            $folderPath = public_path($folderName);
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $fileName = time() . '_' . $data['profile_photo']->getClientOriginalName();
            $data['profile_photo']->move($folderPath, $fileName);
            $user->profile_photo = $folderName . '/' . $fileName;
        }
        $user->save();
    }
    


    public function login($credentials, Request $request)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $agent = new Agent();
            $loginActivity = new LoginActivity();
            $loginActivity->user_id = $user->id;
            $loginActivity->ip_address = $request->ip();
            $loginActivity->device = $agent->device();
            $loginActivity->browser = $agent->browser();
            $loginActivity->login_time = now();
            $loginActivity->save();
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


    public function getUserById($id)
    {
        return User::with('roles')->findOrFail($id); 
    }


    public function updateUser($id, $data)
    {
        $user = User::findOrFail($id);
        $user->name = $data['username'];
        $user->email = $data['email'];
        if (isset($data['profile_photo'])) {
            if ($user->profile_photo) {
                $oldPhotoPath = public_path($user->profile_photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $folderName = 'build/profile_photos'; // Fixed folder inside 'build'
            $folderPath = public_path($folderName);
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $fileName = time() . '_' . $data['profile_photo']->getClientOriginalName();
            $data['profile_photo']->move($folderPath, $fileName);
            $user->profile_photo = $folderName . '/' . $fileName;
        }
        $user->save();
        $user->roles()->sync([$data['role_id']]);
        return true;
    }
    




    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true]);
    }

    
}