$(document).ready(function () {
    $('.delete-notification').on('click', function () {
        var notificationId = $(this).data('id');
        
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
                    url: '/notifications/' + notificationId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#notification-row-' + notificationId).remove();
                            toastr.success('Notification deleted successfully.');
                        } else {
                            toastr.error('An error occurred while deleting the notification.');
                        }
                    },
                    error: function () {
                        toastr.error('An error occurred while processing the request.');
                    }
                });
            }
        });
    });
});
