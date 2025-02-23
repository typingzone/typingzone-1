$(document).ready(function () {
    // Handle form submission for adding document name
    $('#add-document-name-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/document-name',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(this).serialize(),
            success: function (response) {
                toastr.success('Document Name added successfully.');
                location.reload();
            },
            error: function () {
                toastr.error('There was an error adding the document name.');
            }
        });
    });

    // Handle form submission for updating document name
    $('#edit-document-name-form').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let documentId = $('#edit-document-name-form input[name="id"]').val();
    
        $.ajax({
            url: '/document-name/' + documentId,
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if (response.message) {
                    toastr.success(response.message);  
                    $('#edit-document-name-modal').modal('hide');
                    location.reload();
                } else {
                    toastr.error('There was an error updating the document name.');
                }
            },
            error: function () {
                toastr.error('There was an error updating the document name.');
            }
        });
    });
    

    // Edit document name modal
    $('.edit-document-name').click(function () {
        let documentId = $(this).data('id');
        $.ajax({
            url: '/document-name/' + documentId + '/edit',
            type: 'GET',
            success: function (response) {
                if (response.error) {
                    toastr.error(response.error);
                    return;
                }
                $('#edit-document-name-modal').modal('show');
                $('#edit-document-name-form input[name="document_name"]').val(response.document_name);
                $('#edit-document-name-form input[name="id"]').val(response.id);
            },
            error: function () {
                toastr.error('Error fetching document name details.');
            }
        });
    });

    // Toggle status change
    $('.status-toggle').change(function () {
        let documentId = $(this).data('id');
        let status = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '/document-name/toggle/' + documentId,  
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Status toggled successfully.');
                } else {
                    toastr.error('There was an error toggling the status.');
                }
            },
            error: function() {
                toastr.error('There was an error with the request.');
            }
        });
    });

    // Delete document name
    $('.delete-document-name').click(function () {
        let documentId = $(this).data('id');
        let row = $(this).closest('tr'); // Get the closest row (the one containing the delete button)

        // SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/document-name/' + documentId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success('Deleted.');
                            row.remove(); // Remove the row from the table
                        } else {
                            toastr.error('There was an error deleting the document name.');
                        }
                    },
                    error: function () {
                        toastr.error('There was an error deleting the document name.');
                    }
                });
            }
        });
    });
});
