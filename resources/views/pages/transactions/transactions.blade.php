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
                                <th>Total Cost</th>
                                <th>Vat Amount</th>
                                <th>Paid By</th>
                                <th>Added By</th>
                                <th>Pay Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $index => $transaction)
                                <tr id="transaction-row-{{ $transaction->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaction->order->customer_name }}</td>
                                    <td>{{ $transaction->service_id }}</td>
                                    <td>{{ $transaction->application_no }}</td>
                                    <td>{{ $transaction->govt_cost }}</td>
                                    <td>{{ $transaction->service_cost }}</td>
                                    <td>{{ $transaction->total_cost }}</td>
                                    <td>{{ $transaction->vat_amount }}</td>
                                    <td>{{ $transaction->paid_by }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->pay_status }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="{{ route('transaction.receipt', $transaction->id) }}">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            <a class="me-2 edit-transaction p-2" href="javascript:void(0);" data-id="{{ $transaction->id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="p-2 delete-transaction" href="javascript:void(0);" data-id="{{ $transaction->id }}">
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
    <script>
        var transactionsStore = "{{ route('transactions.store') }}";
    </script>
    <script src="{{ asset('custom/js/transactions.js') }}"></script>
@endsection
