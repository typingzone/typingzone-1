$(document).ready(function() {
    $('#save-template').on('click', function() {
        $.ajax({
            url: "/email-templates/store",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                title: $('#template-name').val(),
                subject: $('#template-subject').val(),
                body: $('#template-email-body').val()
            },
            success: function(response) {
                if(response.success) {
                    $('#add-template-modal').modal('hide');
                    toastr.success('Template saved successfully');
                    location.reload();
                } else {
                    toastr.error('Failed to save template');
                }
            },
            error: function(xhr) {
                toastr.error('An error occurred while saving the template');
            }
        });
    });
});


$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var templateId = $(this).data('id');
        var templateCard = $('#template-card-' + templateId);

        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this template!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/email-templates/' + templateId,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Template deleted successfully');
                            templateCard.remove();
                        } else {
                            toastr.error('Failed to delete template');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred while deleting the template');
                    }
                });
            }
        });
    });
});



$(document).ready(function() {
    // Edit button click event
    $('.edit-btn').on('click', function() {
        var templateId = $(this).data('id');
        $.ajax({
            url: '/email-templates/' + templateId + '/edit',
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#edit-template-id').val(response.template.id);
                    $('#edit-template-name').val(response.template.title);
                    $('#edit-template-subject').val(response.template.subject);
                    $('#edit-template-email-body').val(response.template.body);
                    $('#edit-template-modal').modal('show');
                } else {
                    toastr.error('Failed to load template');
                }
            },
            error: function() {
                toastr.error('An error occurred while fetching the template data');
            }
        });
    });

    // Save button click event in edit modal
    $('#save-edit-template').on('click', function() {
        var templateId = $('#edit-template-id').val();
        $.ajax({
            url: '/email-templates/' + templateId,
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                title: $('#edit-template-name').val(),
                subject: $('#edit-template-subject').val(),
                body: $('#edit-template-email-body').val()
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Template updated successfully');
                    $('#edit-template-modal').modal('hide');
                    location.reload(); // Optionally, you can update the specific card instead of reloading the page
                } else {
                    toastr.error('Failed to update template');
                }
            },
            error: function() {
                toastr.error('An error occurred while updating the template');
            }
        });
    });
});
