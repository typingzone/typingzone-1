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
    <script src="{{ asset('build/Custom/custom/js/role_permissions.js') }}"></script>
@endsection
