$(document).ready(function() {

    $('.mySelect2').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-transaction-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/orders" class="mt-2 btn btn-primary btn-sm form-control">Add Customer</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });

    $('.mySelect7').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#edit-transaction-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/orders" class="mt-2 btn btn-primary btn-sm form-control">Add Customer</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });

    $('.mySelect8').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        width: '100%',
        dropdownParent: $('#edit-transaction-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/services" class="mt-2 btn btn-primary btn-sm form-control">Add Service</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });

    $('.mySelect9').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#edit-transaction-modal')
    });

    $('.mySelect3').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-transaction-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/services" class="mt-2 btn btn-primary btn-sm form-control">Add Service</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });

    $('.mySelect4').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-transaction-modal')
    })

});



$(document).ready(function() {
    $('#order_id').change(function() {
        var orderId = $(this).val();
        var serviceSelect = $('#service_id');
        serviceSelect.empty();
        $.ajax({
            url: '/orders/' + orderId + '/services',
            type: 'GET',
            success: function(data) {
                serviceSelect.append('<option value="">Select Service</option>');
                $.each(data, function(index, service) {
                    serviceSelect.append('<option value="' + service.id + '">' + service.service_name + '</option>');
                });
            }
        });
    });
    // When a service is selected, fetch the costs
    $('#service_id').change(function() {
        var serviceId = $(this).val();
        if (serviceId) {
            $.ajax({
                url: '/services/' + serviceId + '/costs',
                type: 'GET',
                success: function(data) {
                    $('#govt_cost').val(data.govt_cost);
                    $('#service_cost').val(data.service_cost);
                }
            });
        } else {
            $('#govt_cost').val('');
            $('#service_cost').val('');
        }
    });
});



$(document).ready(function() {
    $('#add-transaction-modal-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        Swal.fire({
            title: 'Processing...',
            text: 'Adding your transaction',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: transactionsStore,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.close();
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#add-transaction-modal').modal('hide');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(xhr) {
                Swal.close(); 
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '\n';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage
                });
            }
        });
    });
});



$(document).on('click', '.delete-transaction', function() {
    var transactionId = $(this).data('id');
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
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while we delete the transaction.',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            $.ajax({
                url: '/transactions/' + transactionId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.close();
                    if (response.success) {
                        toastr.success(response.message);
                        $('#transaction-row-' + transactionId).remove();
                    } else {
                        toastr.error('Error deleting transaction.');
                    }
                },
                error: function(xhr) {
                    Swal.close();
                    toastr.error('Failed to delete transaction.');
                }
            });
        }
    });
});




$(document).ready(function () {
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('body').on('click', '.status-icon', function () {
        var transactionId = $(this).data('id');
        var currentStatus = $(this).data('status');
        Swal.fire({
            title: 'Choose status',
            text: 'You can change the status of this transaction.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Approved',
            cancelButtonText: 'Rejected',
            showDenyButton: true,
            denyButtonText: 'Pending',
        }).then((result) => {
            if (result.isConfirmed) {
                updateStatus(transactionId, 'approved', $(this));
            } else if (result.isDenied) {
                updateStatus(transactionId, 'pending', $(this));
            } else if (result.isDismissed) {
                updateStatus(transactionId, 'rejected', $(this));
            }
        });
    });

    function updateStatus(transactionId, status, element) {
        $.ajax({
            url: '/transaction/update-status/' + transactionId,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status
            },
            success: function (response) {
                var icon;
                var title;
                if (status == 'approved') {
                    icon = 'fa-check-circle text-success';
                    title = 'Approved';
                } else if (status == 'rejected') {
                    icon = 'fa-times-circle text-danger';
                    title = 'Rejected';
                } else if (status == 'pending') {
                    icon = 'fa-clock text-warning';
                    title = 'Pending';
                }
                element.attr('class', 'fa ' + icon);
                element.attr('data-bs-toggle', 'tooltip');
                element.attr('title', title);
                $(element).tooltip('dispose').tooltip();
                toastr.success('Status ' + response.status);
            },
            error: function () {
                Swal.fire('Error', 'Failed to update status.', 'error');
            }
        });
    }
});




$(document).ready(function() {
    $(document).on('click', '.edit-transaction', function() {
        var transactionId = $(this).data('id');
        $.ajax({
            url: '/transactions/' + transactionId + '/edit',
            type: 'GET',
            success: function(data) {
                $('#edit_transaction_id').val(data.id);
                $('#edit_order_id').empty().append('<option value="'+ data.order_id +'">'+ data.order.customer_name +'</option>');
                $('#edit_service_id').empty().append('<option value="'+ data.service_id +'">'+ data.service.service_name +'</option>');
                $('#edit_application_no').val(data.application_no);
                $('#edit_govt_cost').val(data.govt_cost);
                $('#edit_service_cost').val(data.service_cost);
                $('#edit_paid_by').val(data.paid_by);
                $('#edit_description').val(data.description);
                $('#edit-transaction-modal').modal('show');
            },
            error: function() {
                Swal.fire('Error', 'Unable to fetch transaction data.', 'error');
            }
        });
    });

    $('#edit-transaction-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var transactionId = $('#edit_transaction_id').val();
        Swal.fire({
            title: 'Updating...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        $.ajax({
            url: '/transactions/' + transactionId + '/update',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.close();
                if (response.success) {
                    Swal.fire('Success', response.message, 'success');
                    $('#edit-transaction-modal').modal('hide');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(xhr) {
                Swal.close();
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '\n';
                });
                Swal.fire('Error', errorMessage, 'error');
            }
        });
    });
});
