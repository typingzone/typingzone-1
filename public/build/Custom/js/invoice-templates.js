$(document).ready(function() {
    $('.template-card').on('click', function() {
        var templateName = $(this).data('template');

        $.ajax({
            url: '/set-active-template',
            type: 'POST',
            data: {
                template_name: templateName,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    $('.template-card').removeClass('active-template');
                    $('.active-status').removeClass('active').addClass('inactive').text('Inactive');

                    $('[data-template="' + templateName + '"]').addClass('active-template');
                    $('[data-template="' + templateName + '"] .active-status')
                        .removeClass('inactive')
                        .addClass('active')
                        .text('Active');
                        
                    toastr.success('Template activated successfully');
                } else {
                    toastr.error('Failed to activate template');
                }
            },
            error: function() {
                toastr.error('An error occurred while activating the template');
            }
        });
    });
});