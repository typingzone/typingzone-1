$(document).ready(function() {
    $('#changePasswordForm').on('submit', function(e) {
        e.preventDefault();
        
        let newPassword = $('#new_password').val();
        let confirmPassword = $('#confirm_password').val();
        
        // Get the token and email from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        const email = urlParams.get('email');
        
        if (newPassword !== confirmPassword) {
            toastr.error('Passwords do not match. Please try again.');
            return;
        }

        $.ajax({
            url: '/password/reset', 
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                token: token,
                email: email,
                new_password: newPassword,
                confirm_password: confirmPassword
            },
            success: function(response) {
                if(response.success) {
                    toastr.success('Password changed successfully.');
                    window.location.href = '/login'; 
                } else {
                    toastr.error('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                toastr.error(xhr.responseText+'An error occurred. Please try again.');
            }
        });
    });
});
