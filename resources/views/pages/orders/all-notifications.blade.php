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
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notifications as $index => $notification)
                                <tr id="notification-row-{{ $notification->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $notification->order->customer_name }}</td> <!-- Display Customer Name -->
                                    <td>{{ $notification->comment ?? 'No Message' }}</td> <!-- Display Notification Message -->
                                    <td>{{ $notification->created_at->format('Y-m-d H:i:s') }}</td>
                                   
                                    <td>
                                        <button class="btn btn-danger delete-notification" data-id="{{ $notification->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('custom/js/all-notifications.js') }}"></script>
@endsection
