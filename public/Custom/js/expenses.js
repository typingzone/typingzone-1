$(document).on('submit', '#add-expense-modal-form', function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: '/expenses/store',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            toastr.success('Expense added successfully');
            $('#add-expense-modal').modal('hide');
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function (xhr) {
            toastr.error('Something went wrong. Please try again.');
        }
    });
});

$(document).on('click', '.delete-expense', function() {
    var expenseId = $(this).data('id');
    var row = $(this).closest('tr');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: '/expenses/' + expenseId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success('Expense deleted successfully');
                    row.remove();
                },
                error: function(xhr) {
                    toastr.error('Error deleting the expense. Please try again.');
                }
            });
        } else {
            Swal.fire(
                'Cancelled',
                'Your expense is safe!',
                'error'
            );
        }
    });
});
