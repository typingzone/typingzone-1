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
                                <th>Description</th>
                                <th>Status</th>
                                <th>Assign To</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr data-row-id="{{ $order->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('customer-profile', ['id' => $order->id]) }}">{{ $order->customer_name ?? 'N/A' }}</a></td>
                                <td>{{ $order->phone_number }} / {{ $order->email }}</td>
                                <td>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-html="true" title="<ul>
                                        @foreach($order->service_names as $service)
                                            <li>{{ $service }}</li>
                                        @endforeach
                                    </ul>">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </td>
                                <td>{{ $order->description }}</td>
                                <td><span class="badge badge-success custom-badge">{{ $order->status }}</span></td> 
                                <td><span class="badge badge-dark custom-badge">{{ $order->assignedTo->name }}</span></td> 
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        @can('Orders download')
                                            @if($order->files)
                                            <a class="me-2 p-2" href="{{ route('orders.download', $order->id) }}">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            @endif
                                        @endcan
                                        @can('Orders edit')
                                        <a class="me-2 edit-order p-2" href="javascript:void(0);" data-id="{{ $order->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('Orders delete')
                                        <a class="p-2 delete-order" href="javascript:void(0);" data-id="{{ $order->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endcan
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
    <script>
        var storeOrderUrl = "{{ route('orders.store') }}";
        var deleteOrderUrl = "{{ route('orders.destroy', ':id') }}"; 
    </script>
    <script src="{{ asset('build/Custom/js/orders.js') }}"></script>
@endsection

