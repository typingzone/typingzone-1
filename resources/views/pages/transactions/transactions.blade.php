<?php $page = 'Transactions'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Transactions
                @endslot
                @slot('li_1')
                    Manage your transactions
                @endslot
            @endcomponent
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Application No</th>
                                <th>Govt Cost</th>
                                <th>Service Cost</th>
                                <th>Total Amount</th>
                                <th>Vat Amount</th>
                                <th>Paid By</th>
                                <th>Added By</th>
                                <th>Pay Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaction->order->customer_name }}</td>
                                    <td>{{ $transaction->service->name }}</td>
                                    <td>{{ $transaction->application_no }}</td>
                                    <td>{{ $transaction->govt_cost }}</td>
                                    <td>{{ $transaction->service_cost }}</td>
                                    <td>{{ $transaction->total_cost }}</td>
                                    <td>{{ $transaction->vat_amount }}</td>
                                    <td>{{ $transaction->paid_by }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->pay_status }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>
                                        <!-- Add action buttons (edit, delete, etc.) -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('custom/js/transactions.js') }}"></script>
@endsection
