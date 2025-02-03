
$(document).ready(function () {
    $('#add-service-modal-form').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            url: "/service-store",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                $('#add-service-modal').modal('hide');
                toastr.success('Service added successfully');
                location.reload();
            },
            error: function (xhr) {
                toastr.error('Something went wrong. Please try again.');
            }
        });
    });
});



$(document).on('click', '.delete-service', function () {
    var serviceId = $(this).data('id');
    var row = $(this).closest('tr');

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
                url: '/services/' + serviceId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    toastr.success('Service deleted successfully');
                    row.remove(); 
                },
                error: function (xhr) {
                    toastr.error('Something went wrong. Please try again.');
                }
            });
        }
    });
});




$(document).ready(function () {
    // Handle edit button click
    $(document).on('click', '.edit-service', function () {
        var serviceId = $(this).data('id');

        $.get('/services/' + serviceId + '/edit', function (data) {
            $('#edit-service-id').val(data.id);
            $('#edit-service-name').val(data.service_name);
            $('#edit-govt-cost').val(data.govt_cost);
            $('#edit-service-cost').val(data.service_cost);
            $('#edit-service-modal').modal('show');
        });
    });

    // Handle form submission via AJAX
    $('#edit-service-modal-form').on('submit', function (e) {
        e.preventDefault();  // Prevent the form from submitting the traditional way
        
        var formData = $(this).serialize();

        $.ajax({
            url: '/services/' + $('#edit-service-id').val(),
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                toastr.success('Service updated successfully');
                $('#edit-service-modal').modal('hide');  // Close the modal on success
                location.reload(); // Reload the page to update the data
            },
            error: function (xhr) {
                toastr.error('Something went wrong. Please try again.');
            }
        });
    });
});
