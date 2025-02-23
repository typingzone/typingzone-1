$(document).on('click', '.delete-role', function() {
    var roleId = $(this).data('id');
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
                url: '/delete-role-permission/' + roleId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.success,
                        'success'
                    )
                    $('#role-' + roleId).remove();
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'There was a problem deleting the role.',
                        'error'
                    )
                }
            });
        }
    });
});


$(document).on('click', '.edit-role', function() {
    var roleId = $(this).data('id');
    $('#edit-role-permission-form').attr('action', '/update-role-permissions/' + roleId);
$.ajax({
    url: '/get-role-permissions/' + roleId,
    type: 'GET',
    success: function(response) {
        $('#editRoleId').val(response.role.id);
        $('#editRoleName').val(response.role.name);

        let permissionsHtml = '';
        response.permissions.forEach(function(permission) {
            let checkedView = permission.actions.includes('view') ? 'checked' : '';
            let checkedAdd = permission.actions.includes('add') ? 'checked' : '';
            let checkedEdit = permission.actions.includes('edit') ? 'checked' : '';
            let checkedDelete = permission.actions.includes('delete') ? 'checked' : '';
            let checkedDownload = permission.actions.includes('download') ? 'checked' : '';

            permissionsHtml += `
            <tr>
                <td>${permission.page}</td>
                <td><input type="checkbox" ${checkedView} name="permissions[${permission.page}][]" value="view"></td>
                <td><input type="checkbox" ${checkedAdd} name="permissions[${permission.page}][]" value="add"></td>
                <td><input type="checkbox" ${checkedEdit} name="permissions[${permission.page}][]" value="edit"></td>
                <td><input type="checkbox" ${checkedDelete} name="permissions[${permission.page}][]" value="delete"></td>
                <td><input type="checkbox" ${checkedDownload} name="permissions[${permission.page}][]" value="download"></td>
            </tr>`;
        });

        $('#edit-permissions-body').html(permissionsHtml);
        $('#edit-role-permission-modal').modal('show');
    },
    error: function(xhr) {
        Swal.fire('Error!', 'Unable to fetch role details.' + xhr.responseText, 'error');
    }
    });
});





$(document).on('change', '#edit-select-all', function() {
    var isChecked = $(this).prop('checked');
    $('#edit-permissions-body input[type="checkbox"]').each(function() {
        $(this).prop('checked', isChecked);
    });
});

