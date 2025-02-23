$(document).on('click', '.delete-ticket', function () {
    var ticketId = $(this).data('id');
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
                url: '/tickets/' + ticketId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                success: function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Ticket has been deleted.',
                        'success'
                    );
                    $('#ticket-row-' + ticketId).remove();
                }
            }); 
        }
    });
});

// Edit Ticket
$(document).on('click', '.edit-ticket', function () {
    var ticketId = $(this).data('id');
    $.get('/tickets/' + ticketId + '/edit', function (data) {
        $('#edit-ticket-modal').find('input[name="ticket_id"]').val(ticketId);
        $('#edit-ticket-modal').find('textarea[name="description"]').val(data.description);
        $('#edit-ticket-modal').modal('show');
    });
});




$(document).ready(function() {
    $('.show-ticket').on('click', function(e) {
        e.preventDefault();
        var ticketId = $(this).data('id');
        $.ajax({
            url: '/show-tickets/' + ticketId, 
            method: 'GET',
            success: function(response) {
                $('#ticket-description').text(response.description);
                $('#ticket-date').text(response.created_at); 
                $('#view-ticket-modal').modal('show');
            },
            error: function() {
                alert('Error fetching ticket details');
            }
        });
    });
});
