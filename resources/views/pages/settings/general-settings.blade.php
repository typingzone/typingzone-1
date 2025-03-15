<?php $page = 'general-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content settings-content">
            <div class="page-header settings-pg-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Settings</h4>
                        <h6>Manage your settings on portal</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                                class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
           

            <form id="generalSettingsForm" enctype="multipart/form-data" style="background-color: white; padding: 40px; border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.04);">
                <div class="form-section" style="margin-bottom: 35px; border-bottom: 1px dashed #e0e0e0; padding-bottom: 25px;">
                    <h5 style="font-weight: 600; color: #34495e; margin-bottom: 25px; font-size: 20px;">
                        <i class="fas fa-image" style="color: #3498db; margin-right: 10px;"></i>Visual Identity
                    </h5>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
                        <div class="form-field" style="position: relative;">
                            <label style="display: block; font-weight: 500; color: #34495e; margin-bottom: 10px; font-size: 15px;">
                                Company Icon
                            </label>
                            <div class="upload-wrapper" style="position: relative; height: 120px; border: 2px dashed #3498db; border-radius: 10px; display: flex; align-items: center; justify-content: center; background-color: #f8fafc; overflow: hidden; transition: all 0.3s;">
                                <input type="file" id="company_icon" name="company_icon" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer; z-index: 2;">
                                <div style="text-align: center; color: #7f8c8d;">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 30px; color: #3498db; margin-bottom: 10px; display: block;"></i>
                                    <span style="font-size: 14px;">Drop icon here or click to upload</span>
                                </div>
                            </div>
                            <p style="margin-top: 8px; font-size: 12px; color: #95a5a6; text-align: center;">Recommended size: 64px × 64px</p>
                        </div>
                        
                        <div class="form-field" style="position: relative;">
                            <label style="display: block; font-weight: 500; color: #34495e; margin-bottom: 10px; font-size: 15px;">
                                Company Logo <span style="color: #e74c3c;">*</span>
                            </label>
                            <div class="upload-wrapper" style="position: relative; height: 120px; border: 2px dashed #3498db; border-radius: 10px; display: flex; align-items: center; justify-content: center; background-color: #f8fafc; overflow: hidden; transition: all 0.3s;">
                                <input type="file" id="company_logo" name="company_logo" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer; z-index: 2;">
                                <div style="text-align: center; color: #7f8c8d;">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 30px; color: #3498db; margin-bottom: 10px; display: block;"></i>
                                    <span style="font-size: 14px;">Drop logo here or click to upload</span>
                                </div>
                            </div>
                            <p style="margin-top: 8px; font-size: 12px; color: #95a5a6; text-align: center;">Recommended size: 240px × 80px</p>
                        </div>
                    </div>
                </div>
                
                <div class="form-section" style="margin-bottom: 35px;">
                    <h5 style="font-weight: 600; color: #34495e; margin-bottom: 25px; font-size: 20px;">
                        <i class="fas fa-info-circle" style="color: #3498db; margin-right: 10px;"></i>Business Details
                    </h5>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
                        <div class="form-field">
                            <label style="display: block; font-weight: 500; color: #34495e; margin-bottom: 10px; font-size: 15px;">
                                Company Name <span style="color: #e74c3c;">*</span>
                            </label>
                            <div style="position: relative;">
                                <i class="fas fa-building" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #3498db;"></i>
                                <input type="text" id="company_name" name="company_name" placeholder="Enter your company name" value="{{ old('company_name', $company->company_name ?? '') }}" style="width: 100%; padding: 14px 15px 14px 45px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 15px; transition: all 0.3s; outline: none; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            </div>
                        </div>
                        
                        <div class="form-field">
                            <label style="display: block; font-weight: 500; color: #34495e; margin-bottom: 10px; font-size: 15px;">
                                Address <span style="color: #e74c3c;">*</span>
                            </label>
                            <div style="position: relative;">
                                <i class="fas fa-map-marker-alt" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #3498db;"></i>
                                <input type="text" id="company_address" name="company_address" placeholder="Enter your business address" value="{{ old('company_address', $company->address ?? '') }}" style="width: 100%; padding: 14px 15px 14px 45px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 15px; transition: all 0.3s; outline: none; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            </div>
                        </div>
                        
                        <div class="form-field">
                            <label style="display: block; font-weight: 500; color: #34495e; margin-bottom: 10px; font-size: 15px;">
                                Phone Number <span style="color: #e74c3c;">*</span>
                            </label>
                            <div style="position: relative;">
                                <i class="fas fa-phone-alt" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #3498db;"></i>
                                <input type="text" id="company_phone" name="company_phone" placeholder="Enter your phone number" value="{{ old('company_phone', $company->phone ?? '') }}" style="width: 100%; padding: 14px 15px 14px 45px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 15px; transition: all 0.3s; outline: none; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            </div>
                        </div>
                        
                        <div class="form-field">
                            <label style="display: block; font-weight: 500; color: #34495e; margin-bottom: 10px; font-size: 15px;">
                                Email Address <span style="color: #e74c3c;">*</span>
                            </label>
                            <div style="position: relative;">
                                <i class="fas fa-envelope" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #3498db;"></i>
                                <input type="email" id="company_email" name="company_email" placeholder="Enter your email address" value="{{ old('company_email', $company->email ?? '') }}" style="width: 100%; padding: 14px 15px 14px 45px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 15px; transition: all 0.3s; outline: none; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions" style="text-align: right; margin-top: 30px;">
                    <button type="button" id="saveSettings" style="background: linear-gradient(to right, #3498db, #2980b9); border: none; padding: 14px 30px; border-radius: 10px; color: white; font-weight: 500; box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); transition: all 0.3s; cursor: pointer;">
                        <i class="fas fa-save" style="margin-right: 8px;"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>

        </div>
    </div>
    <script src="{{ asset('build/Custom/js/general-settings.js') }}"></script>
@endsection
