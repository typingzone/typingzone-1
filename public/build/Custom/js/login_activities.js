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



$(document).ready(function() {
    $('#selectAll').on('click', function() {
        if (this.checked) {
            $('.selectRow').each(function() {
                this.checked = true;
            });
        } else {
            $('.selectRow').each(function() {
                this.checked = false;
            });
        }
    });


    $('#select-all').on('click', function() {
        $('.selectRow').prop('checked', this.checked);
    });
    $('#deleteSelected').on('click', function() {
        var ids = [];
        $('.selectRow:checked').each(function() {
            ids.push($(this).val());
        });
        if (ids.length === 0) {
            Swal.fire('Please select at least one record to delete.');
            return;
        }
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
                    url: '/deleteMultipleLoginActivities',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        ids: ids
                    },
                    success: function(response) {
                        if (response.success) {
                            ids.forEach(function(id) {
                                $('#activity-row-' + id).remove();
                            });
                            Swal.fire('Deleted!', 'Selected records have been deleted.', 'success');
                        } else {
                            Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', 'An error occurred while deleting records.', 'error');
                    }
                });
            }
        });
    });
});