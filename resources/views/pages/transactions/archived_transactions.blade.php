<?php $page = 'Archived transactions'; ?>
@extends('layout.mainlayout')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Archived transactions
                @endslot
                @slot('li_1')
                    Manage your Archived transactions
                @endslot
            @endcomponent

            <div class="employee-grid-widget">
                <div class="row">
                    @if(count($tableNames) > 0)
                        @foreach($tableNames as $tableName)
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="employee-grid-profile">
                                    <div class="profile-head">
                                        <div class="dep-name">
                                            @php
                                                $earliestDate = \Carbon\Carbon::parse(DB::table($tableName)->min('created_at'))->toDateString();
                                                $latestDate = \Carbon\Carbon::parse(DB::table($tableName)->max('created_at'))->toDateString();
                                                $dateRange = $earliestDate && $latestDate ? $earliestDate . ' to ' . $latestDate : 'No records';
                                            @endphp
                                            <h5 class="active">Archived {{ $loop->iteration }}</h5>
                                        </div>
                                        <div class="profile-head-action">
                                            <div class="dropdown profile-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i data-feather="more-vertical" class="feather-user"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @can('Archived Tranactions download')
                                                    <li>
                                                        <a href="{{ route('export.archived.transactions', ['tableName' => $tableName]) }}" class="dropdown-item"><i data-feather="download" class="info-img"></i> Download</a>
                                                    </li>
                                                    @endcan
                                                    @can('Archived Tranactions delete')
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item delete-archive mb-0"><i data-feather="trash-2" class="info-img"></i> Delete All</a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-info department-profile-info">
                                        <div class="profile-pic">
                                            <img src="{{ URL::asset('/build/img/users/user-13.jpg') }}" alt="">
                                        </div>
                                        <h4>{{ $dateRange }}</h4>
                                    </div>

                                    <div class="team-members">
                                        <div class="team-member">
                                            <div class="team-member-info">
                                                <p>Total Transactions: {{ DB::table($tableName)->count() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No archived transactions found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/Custom/js/archived_transactions.js') }}"></script>

@endsection
