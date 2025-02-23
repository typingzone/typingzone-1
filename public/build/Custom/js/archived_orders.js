$(document).ready(function() {
    $('.delete-archive').on('click', function(e) {
        e.preventDefault();
        const tableName = $(this).closest('.employee-grid-profile').data('tableName');
        Swal.fire({
            title: 'Are you sure?',
            text: "This action will delete the entire table and all its data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/delete-archived-orders-table',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tableName: tableName
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            $('[data-table-name="' + tableName + '"]').remove();
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function() {
                        toastr.error('Something went wrong. Please try again later.');
                    }
                });
            }
        });
    });
});
