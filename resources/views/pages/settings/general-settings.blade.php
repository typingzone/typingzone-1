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
            <div class="row">
<<<<<<< HEAD
                <div class="col-xl-12">
                    <div class="settings-wrapper d-flex">
                        @component('components.settings-sidebar')
                        @endcomponent
                        <div class="settings-page-wrap">
                            <form action="{{ url('general-settings') }}">
                                <div class="setting-title">
                                    <h4>Profile Settings</h4>
                                </div>
                                <div class="card-title-head">
                                    <h6><span><i data-feather="user" class="feather-chevron-up"></i></span>Employee
                                        Information</h6>
                                </div>
                                <div class="profile-pic-upload">
                                    <div class="profile-pic">
                                        <span><i data-feather="plus-circle" class="plus-down-add"></i> Profile Photo</span>
                                    </div>
                                    <div class="new-employee-field">
                                        <div class="mb-0">
                                            <div class="image-upload mb-0">
                                                <input type="file">
                                                <div class="image-uploads">
                                                    <h4>Change Image</h4>
                                                </div>
                                            </div>
                                            <span>For better preview recommended size is 450px x 450px. Max size 5MB.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">User Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-title-head">
                                    <h6><span><i data-feather="map-pin" class="feather-chevron-up"></i></span>Our Address
                                    </h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">State / Province</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" class="form-control">
=======
                <div class="col-md-3">
                    <div class="connected-app-card">
                        <ul>
                            <li>
                                <div class="app-icon">
                                    <img src="{{ asset('build/img/icons/app-icon-06.svg') }}" alt="">
                                </div>
                                <div class="connect-btn">
                                    <a href="javascript:void(0);">Connected</a>
                                </div>
                            </li>
                            <li>
                                <div class="security-type">
                                    <div class="security-title">
                                        <h5>E-mail</h5>
                                    </div>
                                </div>
                                <div class="status-toggle modal-status d-flex justify-content-between align-items-center ms-2">
                                    <input type="checkbox" id="user6" class="check" checked="">
                                    <label for="user6" class="checktoggle"> </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="connected-app-card">
                        <ul>
                            <li>
                                <div class="app-icon">
                                    <img style="width: 40px" src="{{ asset('build/img/icons/whatsapp-icon.png') }}" alt="">
                                </div>
                                <div class="connect-btn">
                                    <a href="javascript:void(0);">Connected</a>
                                </div>
                            </li>
                            <li>
                                <div class="security-type">
                                    <div class="security-title">
                                        <h5>Whatsapp</h5>
                                    </div>
                                </div>
                                <div class="status-toggle modal-status d-flex justify-content-between align-items-center ms-2">
                                    <input type="checkbox" id="user6" class="check" checked="">
                                    <label for="user6" class="checktoggle"> </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="settings-wrapper">
                        <div class="settings-page-wrap">
                            <form id="generalSettingsForm" enctype="multipart/form-data">
                                <div class="card-title-head">
                                    <h6><span><i data-feather="user" class="feather-chevron-up"></i></span>Company
                                        Information</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company Icon</label>
                                            <input type="file" class="form-control" id="company_icon" name="company_icon" value="{{ old('company_icon', $company->company_icon ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company Logo</label>
                                            <input type="file" class="form-control" id="company_logo" name="company_logo" value="{{ old('company_logo', $company->company_logo ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="{{ old('company_name', $company->company_name ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter address" value="{{ old('company_address', $company->address ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="Enter phone number" value="{{ old('company_phone', $company->phone ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="company_email" name="company_email" placeholder="Enter email address" value="{{ old('company_email', $company->email ?? '') }}">
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end settings-bottom-btn">
<<<<<<< HEAD
                                    <button type="button" class="btn btn-cancel me-2">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Save Changes</button>
=======
                                    <button type="button" class="btn btn-submit" id="saveSettings">Save Changes</button>
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
                                </div>
                            </form>
                        </div>
                    </div>
<<<<<<< HEAD

=======
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

    <script src="{{ asset('build/Custom/js/general-settings.js') }}"></script>

>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
@endsection
