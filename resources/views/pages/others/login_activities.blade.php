@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                Login Activities
                @endslot
                @slot('li_1')
                    Manage Login Activities
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                <table class="table table-sm datanew table-striped">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc">
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>SNO</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Location & Device</th>
                            <th>Browser</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loginActivities as $activity)
                        <tr id="activity-row-{{ $activity->id }}">
                            <td class="sorting_1">
                                <label class="checkboxs">
                                    <input type="checkbox" class="selectRow" value="{{ $activity->id }}">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $activity->user->name }}</td>
                            <td>{{ $activity->user->email }}</td>
                            <td>
                                @foreach($activity->user->roles as $role)
                                    <span>{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $activity->ip_address }} - {{ $activity->device }}</td>
                            <td>{{ $activity->browser }}</td>
                            <td>{{ $activity->login_time }}</td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    @can('Login Activities delete')
                                     <a href="javascript:void(0);" class="p-2 delete-activity" data-id="{{ $activity->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endcan
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
    <script src="{{ asset('build/Custom/js/login_activities.js') }}"></script>
@endsection
