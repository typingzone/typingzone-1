$(document).ready(function() {
    $('#saveSettings').click(function() {
        var formData = new FormData($('#generalSettingsForm')[0]);
        
        for (var pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        $.ajax({
            url: '/updated-company-profile',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Settings have been updated.');
                } else {
                    toastr.error('Something went wrong.');
                }
            },
            error: function() {
                toastr.error('There was a problem with the server.');
            }
        });
    });
});
