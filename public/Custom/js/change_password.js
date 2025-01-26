

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
            url: '/change-password', 
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
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
                toastr.error('An error occurred. Please try again.');
            }
        });
    });
});
