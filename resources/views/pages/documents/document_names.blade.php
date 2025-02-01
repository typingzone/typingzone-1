<?php $page = 'Document Names'; ?>
@extends('layout.mainlayout')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Document Names
                @endslot
                @slot('li_1')
                    Manage your document Names
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Document Name</th>
                                <th>Expiry Reminder</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentNames as $key => $documentName)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $documentName->document_name }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="status-toggle" data-id="{{ $documentName->id }}" {{ $documentName->expiry_reminder ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{ $documentName->created_at->diffForHumans() }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-document-name p-2" href="javascript:void(0);" data-id="{{ $documentName->id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="p-2 delete-document-name" href="javascript:void(0);" data-id="{{ $documentName->id }}">
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
    <script src="{{ asset('custom/js/document_names.js') }}"></script>


    <style>
        /* Toggle Switch CSS */
        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(14px);
        }
    </style>
@endsection
