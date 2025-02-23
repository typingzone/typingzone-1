$(document).ready(function() {
    $('.template-card').on('click', function() {
        var templateName = $(this).data('template');
        $.ajax({
            url: '/set-active-template',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                template_name: templateName
            },
            success: function(response) {
                if(response.success) {
                    toastr.success('Template activated successfully.');
                    window.location.reload();
                } else {
                    toastr.error('Failed to activate template.');
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while activating the template. Please try again.');
            }
        });
    });
});
