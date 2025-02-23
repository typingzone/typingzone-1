$(document).ready(function() {
    $('.mySelect2').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-user-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/role-permission" class="mt-2 btn btn-primary btn-sm form-control">Add Role</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });
});




$(document).ready(function () {
    $('.edit-icon').on('click', function () {
        var userId = $(this).data('id');
        $.ajax({
            url: '/users/' + userId + '/edit',
            type: 'GET',
            success: function (data) {
                $('#edit-user-id').val(data.id);
                $('#editUsername').val(data.name);
                $('#editEmail').val(data.email);
                $('#editRole').val(data.role_id);
                $('#edit-user-modal').modal('show');
            }
        });
    });

    // Handle form submit for updating user
    $('#edit-user-form').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var userId = $('#edit-user-id').val();
        
        $.ajax({
            url: '/users/' + userId,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    location.reload(); 
                } else {
                    alert('Error updating user');
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});

$('.delete-user').on('click', function () {
        var userId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/users/' + userId,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.success) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'User has been deleted.',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            });
                            $('tr[data-row-id="' + userId + '"]').fadeOut(300, function() {
                                $(this).remove(); //
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Error deleting user',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
   