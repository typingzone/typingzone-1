<?php $page = 'Invoices'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Due Invoices
                @endslot
                @slot('li_1')
                    Manage your invoices
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Order</th>
                                <th>Service</th>
                                <th>Application No</th>
                                <th>Total Cost</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr id="invoice-row-{{ $invoice->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($invoice->order)
                                            <a href="{{ route('customer-profile', ['id' => $invoice->order->id]) }}">{{ $invoice->order->customer_name ?? 'N/A' }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $invoice->service->service_name ?? 'N/A' }}
                                        @if($invoice->description)
                                            <i class="fa fa-info-circle text-info" data-bs-toggle="tooltip" title="{{ $invoice->description }}"></i>
                                        @endif
                                    </td>
                                    <td>{{ $invoice->application_no }}</td>
                                    <td>{{ $invoice->total_cost }}</td>
                                    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                        <a class="me-2 p-2 check-invoice" data-id="{{ $invoice->id }}" href="#" data-bs-toggle="tooltip" title="Mark invoice as paid">
                                            <i class="fa fa-check"></i>
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
    <script src="{{ asset('build/Custom/js/invoices.js') }}"></script>
@endsection
