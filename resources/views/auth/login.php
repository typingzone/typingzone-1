<?php $page = 'Login'; ?>
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
                <form id="loginForm">
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Login</h3>
                            <h4>Access Dashboard through entering your credentials</h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="pass-group">
                                <input type="text" id="email" class="pass-input" required>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" id="password" class="pass-inputa" required>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Login</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Forget Password? <a href="{{ url('signin-3') }}" class="hover-a">Click Here</a></h4>
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
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                let email = $('#email').val();
                let password = $('#password').val();

                $.ajax({
                    url: '{{ route("login-attempt") }}',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success) {
                            toastr.success('Success! Redirecting you to dashboard');
                            window.location.href = '{{ url("dashboard") }}';
                        } else {
                            toastr.error('Invalid credentials, please try again.');
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
