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
<<<<<<< HEAD
                                <input type="password" id="new_password" class="pass-inputa" required>
=======
                            <input type="password" placeholder="Enter your new password" id="new_password" name="new_password" class="pass-inputa" required>
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Confirm New Password</label>
                            <div class="pass-group">
<<<<<<< HEAD
                                <input type="password" id="confirm_password" class="pass-inputs" required>
=======
                            <input type="password" placeholder="Repeat your password" id="confirm_password" name="confirm_password" class="pass-inputs" required>
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Change Password</button>
                        </div>
                        <div class="signinform text-center">
<<<<<<< HEAD
                            <h4>Return to <a href="{{ url('signin-3') }}" class="hover-a">login</a></h4>
=======
                            <h4>Return to <a href="{{ url('login') }}" class="hover-a">login</a></h4>
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
                        </div>
                    </div>
                </form>
            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
<<<<<<< HEAD
                <p>Copyright &copy; <?php echo date('Y'); ?> TrackLog. All rights reserved</p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#changePasswordForm').on('submit', function(e) {
                e.preventDefault();
                let newPassword = $('#new_password').val();
                let confirmPassword = $('#confirm_password').val();

                if (newPassword !== confirmPassword) {
                    toastr.error('Passwords do not match. Please try again.');
                    return;
                }

                $.ajax({
                    url: '{{ route("change-password") }}', 
                    type: 'POST',
                    data: {
                        new_password: newPassword,
                        confirm_password: confirmPassword,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success) {
                           toastr.success('Password changed successfully.');
                            window.location.href = '{{ url("login") }}'; 
                        } else {
                            toastr.error('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
=======
                <p>Copyright &copy; <?php echo date('Y'); ?> TypingZone. All rights reserved</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/Custom/js/change_password.js') }}"></script>

>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
@endsection
