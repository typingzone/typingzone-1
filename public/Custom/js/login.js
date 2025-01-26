

$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();

        $.ajax({
            url: '/login-attempt',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if(response.success) {
                    toastr.success('Success! Redirecting you to dashboard');
                    window.location.href = '/dashboard';
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
