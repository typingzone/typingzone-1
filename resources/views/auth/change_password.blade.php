<?php $page = 'New Password'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="account-content">
        <div class="login-wrapper login-new">
            <div class="login-content user-login">
                <div class="login-logo">
                    <img src="{{ URL::asset('/build/img/logo.png') }}" alt="img">
                    <a href="{{ url('index') }}" class="login-logo logo-white">
                        <img src="{{ URL::asset('/build/img/logo-white.png') }}" alt="">
                    </a>
                </div>
                <form id="changePasswordForm">
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Choose New Password</h3>
                            <h4>Choose and confirm new password</h4>
                        </div>
                        <div class="form-login">
                            <label>New Password</label>
                            <div class="pass-group">
                            <input type="password" placeholder="Enter your new password" id="new_password" name="new_password" class="pass-inputa" required>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Confirm New Password</label>
                            <div class="pass-group">
                            <input type="password" placeholder="Repeat your password" id="confirm_password" name="confirm_password" class="pass-inputs" required>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Change Password</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Return to <a href="{{ url('login') }}" class="hover-a">login</a></h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p>Copyright &copy; <?php echo date('Y'); ?> TypingZone. All rights reserved</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/Custom/js/change_password.js') }}"></script>

@endsection
