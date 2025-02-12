$(document).ready(function() {
    $('.mySelect2').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-order-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append(
                    '<div class="select2-link"><a href="/manage-users" class="mt-2 btn btn-primary btn-sm form-control">Add User</a></div>'
                )
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });
});

$(document).ready(function() {
    $('.mySelect4').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#edit-order-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append(
                    '<div class="select2-link"><a href="/manage-users" class="mt-2 btn btn-primary btn-sm form-control">Add User</a></div>'
                )
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });
});

$(document).ready(function() {
    $('.mySelect5').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#edit-order-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append(
                    '<div class="select2-link"><a href="/manage-users" class="mt-2 btn btn-primary btn-sm form-control">Add User</a></div>'
                )
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });
});

$(document).ready(function() {
    $('.mySelect3').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-order-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append(
                    '<div class="select2-link"><a href="/services" class="mt-2 btn btn-primary btn-sm form-control">Add Service</a></div>'
                )
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });
});


$(document).ready(function() {
    $('#add-order-modal-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we process your request.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        $.ajax({
            url: storeOrderUrl, 
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.close(); 
                if(response.success) {
                    $('#add-order-modal').modal('hide');
                    location.reload(); 
                    toastr.success('Order added successfully!');
                } else {
                    toastr.error('Error occurred. Please try again.');
                }
            },
            error: function(response) {
                Swal.close(); 
                toastr.error('Error occurred. Please try again.');
            }
        });
    });
});


$(document).on('click', '.delete-order', function() {
    var orderId = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: 'This will permanently delete the order!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: deleteOrderUrl.replace(':id', orderId),
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.success) {
                        $('tr[data-row-id="' + orderId + '"]').remove();
                        toastr.success('Order deleted successfully!');
                    } else {
                        toastr.error('Error occurred. Please try again.');
                    }
                },
                error: function(response) {
                    toastr.error('Error occurred. Please try again.');
                }
            });
        }
    });
});


$(document).on('click', '.edit-order', function() {
    var orderId = $(this).data('id');
    var editOrderUrl = '/orders/' + orderId + '/edit';
    var updateOrderUrl = '/orders/' + orderId;
    $.get(editOrderUrl, function(data) {
        $('#edit_order_id').val(data.id);
        $('#edit_customer_name').val(data.customer_name);
        $('#edit_phone_number').val(data.phone_number);
        $('#edit_email').val(data.email);
        $('#edit_services').val(data.service_ids).trigger('change');
        $('#edit_assign_to').val(data.assign_to_id).trigger('change');
        $('#edit_description').val(data.description);
        $('#edit-order-modal-form').attr('action', updateOrderUrl);
        $('#edit-order-modal').modal('show');
    });
});
