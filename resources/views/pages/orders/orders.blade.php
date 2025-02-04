@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Orders
                @endslot
                @slot('li_1')
                    Manage your orders
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Customer Name</th>
                                <th>Phone Number/Email</th>
                                <th>Services</th>
                                <th>Attachments</th>
                                <th>Description</th>
                                <th>Assign To</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr data-row-id="{{ $order->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->phone_number }} / {{ $order->email }}</td>
                                <td>{{ implode(', ', $order->services) }}</td>
                                <td>{{ implode(', ', $order->files) }}</td>
                                <td>{{ $order->description }}</td>
                                <td>{{ $order->assignedTo->name }}</td> <!-- Display assigned user's name -->
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 edit-order p-2" href="javascript:void(0);" data-id="{{ $order->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="p-2 delete-order" href="javascript:void(0);" data-id="{{ $order->id }}">
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
    <script src="{{ asset('custom/js/orders.js') }}"></script>
@endsection
