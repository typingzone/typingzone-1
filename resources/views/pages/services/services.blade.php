<?php $page = 'Services'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Services
                @endslot
                @slot('li_1')
                    Manage your services
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Name</th>
                                <th>Govt Fee</th>
                                <th>Service Fee</th>
                                <th>Added By</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr data-row-id="{{ $service->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->govt_cost }}</td>
                                <td>{{ $service->service_cost }}</td>
                                <td><span class="badge badge-dark custom-badge">{{ $service->user->name ?? 'System' }}</span></td>
                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        @can('Services edit')
                                        <a class="me-2 edit-icon p-2 edit-service" href="javascript:void(0);" data-id="{{ $service->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('Services delete')
                                        <a class="p-2 delete-service" href="javascript:void(0);" data-id="{{ $service->id }}">
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

    <!-- Pass services data to JavaScript -->
    <script>
        let servicesData = @json($services);
    </script>
    <script src="{{ asset('build/Custom/js/services.js') }}"></script>
@endsection
