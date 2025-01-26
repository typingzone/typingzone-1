

$(document).ready(function() {
    $('#resetPasswordForm').on('submit', function(e) {
        e.preventDefault();
        let email = $('#email').val();

        $.ajax({
            url: '/attempt-reset-password', 
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                email: email
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
