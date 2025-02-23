
$(document).on('click', '.check-invoice', function(e) {
    e.preventDefault();
    let invoiceId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to mark this invoice as paid?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, mark it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/invoices/mark-paid/' + invoiceId,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Marked!',
                            'Invoice has been marked as paid.',
                            'success'
                        );
                        $('#invoice-row-' + invoiceId).remove(); // Remove the row from the table
                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an issue marking the invoice as paid.',
                            'error'
                        );
                    }
                }
            });
        }
    });
});
