<?php $page = 'Roles & Permissions'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Roles & Permissions
                @endslot
                @slot('li_1')
                    Manage your roles and permissions
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sno = 1; @endphp
                            @foreach($roles as $role)
                                <tr id="role-{{ $role->id }}">
                                    <td>{{ $sno++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2 edit-role" href="#" data-id="{{ $role->id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2 delete-role" href="javascript:void(0);" data-id="{{ $role->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('build/custom/js/role_permissions.js') }}"></script>

    <script>
        


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

    // Set the form action dynamically with the role ID
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



    </script>

@endsection
