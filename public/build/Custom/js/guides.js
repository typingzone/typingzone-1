$(document).ready(function () {
    $('#add-guide-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/guides',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire('Success!', 'Guide added successfully.', 'success')
                    .then(() => location.reload());
            },
            error: function () {
                Swal.fire('Error!', 'There was an error adding the guide.', 'error');
            }
        });
    });

    $('.edit-guide').click(function () {
        var id = $(this).data('id');
        $.get('/guides/' + id, function (guide) {
            $('#edit-guide-form input[name="title"]').val(guide.title);
            $('#edit-guide-form textarea[name="description"]').val(guide.description);
            $('#edit-guide-form input[name="id"]').val(guide.id);
            var modal = new bootstrap.Modal(document.getElementById('edit-guide-modal'));
            modal.show();
        });
    });

    $('#edit-guide-form').submit(function (e) {
        e.preventDefault();
        var id = $('input[name="id"]').val();
        $.ajax({
            url: '/guides/' + id,
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire('Success!', 'Guide updated successfully.', 'success')
                    .then(() => location.reload());
            },
            error: function () {
                Swal.fire('Error!', 'There was an error updating the guide.', 'error');
            }
        });
    });

    $('.delete-guide').click(function () {
        var id = $(this).data('id');
        var guideCard = $(this).closest('.col-md-4');
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
                    url: '/guides/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire('Deleted!', 'Guide has been deleted.', 'success')
                            .then(() => guideCard.remove());
                    },
                    error: function () {
                        Swal.fire('Error!', 'There was an error deleting the guide.', 'error');
                    }
                });
            }
        });
    });
});
