<?php $page = 'Manage Tickets'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Tickets
                @endslot
                @slot('li_1')
                    Manage your ticket
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr id="ticket-row-{{ $ticket->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ticket->description }}</td>
                                    <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2 show-ticket" data-id="{{ $ticket->id }}" href="#">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="me-2 p-2 edit-ticket" data-id="{{ $ticket->id }}" href="#">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="p-2 delete-ticket" data-id="{{ $ticket->id }}" href="#">
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
    <script src="{{ asset('custom/js/tickets.js') }}"></script>
@endsection

