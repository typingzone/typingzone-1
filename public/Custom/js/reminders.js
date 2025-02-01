$(document).ready(function() {
    // When the toggle status changes
    $('.status-toggle').change(function() {
        var reminderId = $(this).data('id');
        var status = $(this).prop('checked') ? 1 : 0;
        $.ajax({
            url: '/update-reminders',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: reminderId,
                status: status,
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Reminder status updated successfully!');
                } else {
                    toastr.error('Something went wrong. Please try again.');
                }
            },
            error: function() {
                toastr.error('An error occurred. Please try again.');
            }
        });
    });
});
