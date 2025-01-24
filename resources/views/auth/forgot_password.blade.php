<?php $page = 'Forget Password'; ?>
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
                <form id="resetPasswordForm">
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Forgot Password?</h3>
                            <h4>Enter your registered email to get OTP</h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="pass-group">
                                <input type="email" id="email" class="pass-input" required>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Reset</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Remember Password? <a href="{{ url('signin-3') }}" class="hover-a">Click Here</a></h4>
                        </div>
                    </div>
                </form>
            </div>
            <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                <p>Copyright &copy; <?php echo date('Y'); ?> TrackLog. All rights reserved</p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#resetPasswordForm').on('submit', function(e) {
                e.preventDefault();
                let email = $('#email').val();

                $.ajax({
                    url: '{{ route("reset-password") }}', 
                    type: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success) {
                            toastr.success('OTP has been sent to your email.');
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
@endsection
