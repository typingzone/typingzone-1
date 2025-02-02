<?php $page = 'Expenses'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Expenses
                @endslot
                @slot('li_1')
                    Manage your expenses
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Expense Name</th>
                                <th>Vat</th>
                                <th>Amount</th>
                                <th>Added By</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $index => $expense)
                            <tr data-row-id="{{ $expense->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $expense->name }}</td>
                                <td>{{ $expense->vat }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td>{{ $expense->user->name }}</td>
                                <td>{{ $expense->created_at->diffForHumans() }}</td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="p-2 delete-expense" href="javascript:void(0);" data-id="{{ $expense->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a class="p-2 download-file" href="{{ route('expenses.download', $expense->id) }}">
                                            <i class="fa fa-download"></i>
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
    <script src="{{ asset('custom/js/expenses.js') }}"></script>
@endsection
