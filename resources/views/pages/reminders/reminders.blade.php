<?php $page = 'Reminders'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Reminders
                @endslot
                @slot('li_1')
                    Manage your reminders
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Reminder Type</th>
                                <th>Status</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reminders as $key => $reminder)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $reminder->reminder_type }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="status-toggle" data-id="{{ $reminder->id }}" {{ $reminder->status ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{ $reminder->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/Custom/js/reminders.js') }}"></script>

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
