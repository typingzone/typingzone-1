$(document).ready(function() {
    $('.delete-activity').click(function() {
        var activityId = $(this).data('id');
        var row = $('#activity-row-' + activityId);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/login-activity/' + activityId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Deleted!', 'Login activity has been deleted.', 'success');
                            row.remove(); 
                        } else {
                            Swal.fire('Error!', 'There was a problem deleting the activity.', 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', 'There was a problem deleting the activity.', 'error');
                    }
                });
            }
        });
    });
});