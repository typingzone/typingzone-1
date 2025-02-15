<?php $page = 'All Notifications'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    All Notifications
                @endslot
                @slot('li_1')
                    Manage your notifications
                @endslot
            @endcomponent
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Customer Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notifications as $index => $notification)
                                <tr id="notification-row-{{ $notification->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $notification->order->customer_name }}</td> 
                                    <td>{{ $notification->order->description }}</td> 
                                    <td>{{ $notification->created_at->format('Y-m-d') }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action d-flex justify-content-start">
                                            <a class="me-2 p-2 delete-notification" href="javascript:void(0);" data-id="{{ $notification->id }}">
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
    <script src="{{ asset('build/Custom/js/all-notifications.js') }}"></script>
@endsection
