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
                            <tr>
                                <td>1</td>
                                <td>Document Expiry</td>
                                <td>On</td>
                                <td>date</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Custom Reminders</td>
                                <td>Off</td>
                                <td>date</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pending Transactions Reminder</td>
                                <td>On</td>
                                <td>date</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Custom Reminders</td>
                                <td>Off</td>
                                <td>date</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('custom/js/reminders.js') }}"></script>
@endsection
