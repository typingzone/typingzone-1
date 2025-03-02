@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper" style="background-color: #f8f9fa; min-height: 100vh;">
        <div class="content settings-content" style="padding: 25px 0;">
            <div class="page-header settings-pg-header" style="background-color: #fff; border-radius: 10px; padding: 15px 20px; margin-bottom: 25px; box-shadow: 0 0 20px rgba(0,0,0,0.05);">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 style="font-weight: 700; color: #333; margin-bottom: 5px;">Settings</h4>
                        <h6 style="color: #6c757d; font-weight: 400; margin: 0;">Manage your profile settings</h6>
                    </div>
                </div>
                <ul class="table-top-head" style="list-style: none; margin: 0; padding: 0; display: flex;">
                    <li style="margin-left: 15px;">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh" style="color: #5E5873; background-color: #f5f5f5; height: 36px; width: 36px; display: flex; align-items: center; justify-content: center; border-radius: 6px;"><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
                    </li>
                    <li style="margin-left: 15px;">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header" style="color: #5E5873; background-color: #f5f5f5; height: 36px; width: 36px; display: flex; align-items: center; justify-content: center; border-radius: 6px;"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card" style="border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 30px;">
                        <div class="card-header" style="background: linear-gradient(135deg, #36353f, #36353f); padding: 20px 25px; border: none;">
                            <h5 class="card-title" style="color: white; font-weight: 600; margin: 0; display: flex; align-items: center;">
                                <i data-feather="user" style="width: 22px; height: 22px; margin-right: 10px;"></i>
                                Profile Settings
                            </h5>
                        </div>
                        <div class="card-body" style="padding: 30px;">
                            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-3" style="position: relative;">
                                        <div class="profile-upload mb-4" style="text-align: center;">
                                            <div class="profile-upload-img" style="width: 180px; height: 180px; overflow: hidden; border-radius: 50%; border: 3px solid #f1f1f1; margin: 0 auto; position: relative; background-color: #f8f9fa; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                                                <img src="{{ asset(Auth::user()->profile_photo ?? '/build/img/logo-small.jpeg') }}" id="preview-image" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <div class="profile-upload-content mt-4">
                                                <div class="profile-upload-btn">
                                                    <label for="profile_photo" class="btn" style="background: linear-gradient(135deg, #36353f, #36353f); color: white; border: none; border-radius: 30px; padding: 10px 20px; font-weight: 500; transition: all 0.3s ease; cursor: pointer; box-shadow: 0 5px 15px rgba(115, 103, 240, 0.3);">
                                                        <i data-feather="camera" style="width: 16px; height: 16px; margin-right: 8px; vertical-align: text-bottom;"></i>
                                                        Change Photo
                                                    </label>
                                                    <input type="file" name="profile_photo" id="profile_photo" class="hide-input" onchange="previewImage(this)" style="position: absolute; opacity: 0; width: 0; height: 0; overflow: hidden;">
                                                </div>
                                                <p class="mb-0 mt-3" style="color: #6c757d; font-size: 13px;">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label style="font-weight: 500; color: #333; margin-bottom: 8px; display: block;">Full Name <span class="text-danger">*</span></label>
                                                    <div class="input-group" style="box-shadow: 0 3px 8px rgba(0,0,0,0.03); border-radius: 8px; overflow: hidden;">
                                                        <span class="input-group-text" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-right: none; color: #7367F0; padding: 10px 15px;">
                                                            <i data-feather="user" style="width: 18px; height: 18px;"></i>
                                                        </span>
                                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required style="height: 48px; border: 1px solid #e9ecef; border-left: none; font-size: 15px; padding: 10px 15px;">
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label style="font-weight: 500; color: #333; margin-bottom: 8px; display: block;">Email <span class="text-danger">*</span></label>
                                                    <div class="input-group" style="box-shadow: 0 3px 8px rgba(0,0,0,0.03); border-radius: 8px; overflow: hidden;">
                                                        <span class="input-group-text" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-right: none; color: #7367F0; padding: 10px 15px;">
                                                            <i data-feather="mail" style="width: 18px; height: 18px;"></i>
                                                        </span>
                                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required style="height: 48px; border: 1px solid #e9ecef; border-left: none; font-size: 15px; padding: 10px 15px;">
                                                    </div>
                                                    @error('email')
                                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label style="font-weight: 500; color: #333; margin-bottom: 8px; display: block;">Current Password <span class="text-danger">*</span></label>
                                                    <div class="input-group pass-group" style="box-shadow: 0 3px 8px rgba(0,0,0,0.03); border-radius: 8px; overflow: hidden;">
                                                        <span class="input-group-text" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-right: none; color: #7367F0; padding: 10px 15px;">
                                                            <i data-feather="lock" style="width: 18px; height: 18px;"></i>
                                                        </span>
                                                        <input type="password" name="current_password" class="form-control" style="height: 48px; border: 1px solid #e9ecef; border-left: none; font-size: 15px; padding: 10px 15px; padding-right: 40px;">
                                                        <span class="toggle-password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); z-index: 10; cursor: pointer; color: #6c757d;">
                                                            <i data-feather="eye" class="feather-eye" style="width: 18px; height: 18px;"></i>
                                                        </span>
                                                    </div>
                                                    @error('current_password')
                                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                                    @enderror
                                                    <p class="text-muted" style="font-size: 13px; margin-top: 5px;">Required only if changing password</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label style="font-weight: 500; color: #333; margin-bottom: 8px; display: block;">New Password</label>
                                                    <div class="input-group pass-group" style="box-shadow: 0 3px 8px rgba(0,0,0,0.03); border-radius: 8px; overflow: hidden;">
                                                        <span class="input-group-text" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-right: none; color: #7367F0; padding: 10px 15px;">
                                                            <i data-feather="key" style="width: 18px; height: 18px;"></i>
                                                        </span>
                                                        <input type="password" name="new_password" class="form-control" style="height: 48px; border: 1px solid #e9ecef; border-left: none; font-size: 15px; padding: 10px 15px; padding-right: 40px;">
                                                        <span class="toggle-password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); z-index: 10; cursor: pointer; color: #6c757d;">
                                                            <i data-feather="eye" class="feather-eye" style="width: 18px; height: 18px;"></i>
                                                        </span>
                                                    </div>
                                                    @error('new_password')
                                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                                    @enderror
                                                    <p class="text-muted" style="font-size: 13px; margin-top: 5px;">Leave blank to keep current password</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #36353f, #36353f); color: white; border: none; border-radius: 8px; padding: 12px 30px; font-weight: 500; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(115, 103, 240, 0.3);">
                                        <i data-feather="save" style="width: 16px; height: 16px; margin-right: 8px; vertical-align: text-bottom;"></i>
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/Custom/js/profile_settings.js') }}"></script>
@endsection