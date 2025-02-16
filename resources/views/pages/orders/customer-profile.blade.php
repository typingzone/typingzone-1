<?php $page = 'Customer Profile'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Customer Profile
                @endslot
                @slot('li_1')
                    Manage your Customer Profile
                @endslot
            @endcomponent

            <div class="row">
                <!-- Customer Profile Card -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Information</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> {{ $profileData->customer_name }}</li>
                                <li class="list-group-item"><strong>Phone:</strong> {{ $profileData->phone_number }}</li>
                                <li class="list-group-item"><strong>Email:</strong> {{ $profileData->email }}</li>
                                <li class="list-group-item"><strong>Status:</strong> {{ $profileData->status }}</li>
                                <li class="list-group-item"><strong>Assigned To:</strong> {{ $profileData->assignedTo->name ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table Card -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Transactions</h5>
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Application No</th>
                                        <th>Service</th>
                                        <th>Total Cost</th>
                                        <th>Paid By</th>
                                        <th>Pay Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profileData->transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->application_no }}</td>
                                            <td>{{ $transaction->service->service_name ?? 'N/A' }}</td>
                                            <td>{{ $transaction->total_cost }}</td>
                                            <td>{{ $transaction->paid_by }}</td>
                                            <td>{{ $transaction->pay_status }}</td>
                                            <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
