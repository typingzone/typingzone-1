<?php $page = 'Manage Users'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Manage Users
                @endslot
                @slot('li_1')
                    Manage your users
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr data-row-id="{{ $user->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span>{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);" data-id="{{ $user->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="p-2 delete-user" href="javascript:void(0);" data-id="{{ $user->id }}">
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
    <script src="{{ asset('custom/js/manage_users.js') }}"></script>
@endsection
