<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-widget w-100">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('/build/img/icons/dash1.svg') }}" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>AED <span class="counters" data-count="{{ $totalExpenses }}">0</span></h5>
                            <h6>Total Expenses</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-widget dash1 w-100">
                        <div class="dash-widgetimg">
                            <span>
                                <i class="fa fa-coins"></i>
                            </span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>AED <span class="counters" data-count="{{ $allTransactionsServiceCost }}">0</span></h5>
                            <h6>Total Service Charges</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-widget dash2 w-100">
                        <div class="dash-widgetimg">
                            <span>
                                <i class="fa fa-coins"></i>
                            </span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>AED <span class="counters" data-count="{{ $allTransactionsAmount }}">0</span></h5>
                            <h6>Total Amount</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-widget dash3 w-100">
                        <div class="dash-widgetimg">
                            <span>
                                <i class="fa fa-clock"></i>
                            </span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>AED <span class="counters" data-count="{{ $dueTransactionsAmount }}">0</span></h5>
                            <h6>Total Due</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>{{ $openTickets }}</h4>
                            <h5>Open Tickets</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="check-square"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>{{ $allTasks }}</h4>
                            <h5>Total Applications</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="box"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>{{ $allPendingTasks }}</h4>
                            <h5>Pending Applications</h5>
                        </div>
                        <div class="dash-imgs">
                            <img src="{{ URL::asset('/build/img/icons/file-text-icon-01.svg') }}" class="img-fluid"
                                alt="icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4>{{ $expiredDocumentsCount }}</h4>
                            <h5>Expired Documents</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->

            <div class="row">
                <div class="col-xl-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Sales Chart</h5>
                            <div class="graph-sets">
                                <ul class="mb-0">
                                    <li>
                                        <span>Sales</span>
                                    </li>
                                </ul>
                                <div class="dropdown dropdown-wraper">
                                    <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton">
                                        {{ date('Y') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                       @include('pages.dashboard.sales-chart')
                    </div>
                </div>
                <div class="col-xl-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill default-cover mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">My Pending Tasks</h4>
                            <div class="view-all-link">
                                <a href="{{ route('orders') }}" class="view-all d-flex align-items-center">
                                    View All<span class="ps-2 d-flex align-items-center"><i data-feather="arrow-right"
                                            class="feather-16"></i></span>
                                </a>
                            </div>
                        </div>
                        @include('pages.dashboard.dashboard-pending-tasks')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Expiring Documents</h4>
                </div>
                @include('pages.dashboard.expiring-dcouments')
            </div>
        </div>
    </div>
@endsection
