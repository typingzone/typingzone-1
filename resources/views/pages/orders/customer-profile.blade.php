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

            <!-- Invoice Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <img src="{{ asset('images/company_logo.png') }}" alt="Company Logo" class="invoice-logo">
                            <h2 class="invoice-title">Invoice</h2>
                        </div>
                        <div class="invoice-body">
                            <div class="invoice-details">
                                <p><strong>Customer Name:</strong> {{ $profileData->customer_name }}</p>
                                <p><strong>Email:</strong> {{ $profileData->email }}</p>
                                <p><strong>Phone:</strong> {{ $profileData->phone_number }}</p>
                            </div>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Application No</th>
                                        <th>Total Cost</th>
                                        <th>Paid By</th>
                                        <th>Pay Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profileData->transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->service->service_name ?? 'N/A' }}</td>
                                            <td>{{ $transaction->application_no }}</td>
                                            <td>{{ $transaction->total_cost }}</td>
                                            <td>{{ $transaction->paid_by }}</td>
                                            <td>{{ $transaction->pay_status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="invoice-footer">
                                <p><strong>Total Due:</strong> {{ $profileData->transactions->where('pay_status', 'unpaid')->sum('total_cost') }}</p>
                            </div>
                        </div>
                        <div class="invoice-footer">
                            <button class="btn btn-primary" id="downloadInvoiceBtn">Download Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('downloadInvoiceBtn').addEventListener('click', function() {
            window.print(); // For now, just prints the page, later use a PDF library like jsPDF for download.
        });
    </script>

    <style>
        .invoice-container {
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .invoice-logo {
            width: 100px;
            height: auto;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
        }

        .invoice-body {
            margin-top: 20px;
        }

        .invoice-details p {
            font-size: 16px;
            margin: 5px 0;
        }

        .invoice-footer {
            text-align: right;
            margin-top: 20px;
        }

        .invoice-footer button {
            font-size: 16px;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #ddd;
        }
    </style>
@endsection
