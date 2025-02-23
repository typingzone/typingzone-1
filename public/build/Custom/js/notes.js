$(document).ready(function() {
    $(document).on('click', '.edit-note', function() {
        var noteId = $(this).data('id');
        $.ajax({
            url: '/notes/' + noteId + '/edit',
            method: 'GET',
            success: function(response) {
                var formattedDate = response.reminder_date ? response.reminder_date.split('T')[0] : '';
                $('#edit-note-id').val(response.id);
                $('#edit-title').val(response.title);
                $('#edit-note-body').val(response.note);
                $('#edit-reminder-date').val(formattedDate);
            }
        });
    });

    $('#edit-note-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var noteId = $('#edit-note-id').val();
        $.ajax({
            url: '/notes/' + noteId,
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                toastr.success('Note updated successfully!');
                location.reload();
            },
            error: function(response) {
                toastr.error('Error updating note: ' + response.responseJSON.error);
            }
        });
    });
    

    $(document).on('click', '.delete-note', function() {
        var noteId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/notes/' + noteId,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('Note deleted successfully!');
                        $('button[data-id="' + noteId + '"]').closest('.card').remove();
                    },
                    error: function(response) {
                        toastr.error('Error deleting note');
                    }
                });
            }
        });
    });
});
