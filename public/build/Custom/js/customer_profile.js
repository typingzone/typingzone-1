$('#markCompleteBtn').on('click', function() {
    var orderId = $(this).data('order-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to mark this profile as complete!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, complete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/orders/complete/' + orderId,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    order_id: orderId
                },
                success: function(response) {
                    Swal.fire('Completed!', 'The profile has been marked as complete.', 'success');
                    location.reload();
                },
                error: function() {
                    Swal.fire('Error', 'There was a problem completing the order.', 'error');
                }
            });
        }
    });
});
