<?php $page = 'Archived Orders'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Archived Orders
                @endslot
                @slot('li_1')
                    Manage your Archived Orders
                @endslot
               
            @endcomponent


            <div class="employee-grid-widget">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="employee-grid-profile">
                            <div class="profile-head">
                                <div class="dep-name">
                                    <h5 class="active">April</h5>
                                </div>
                                <div class="profile-head-action">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i data-feather="more-vertical"
                                                class="feather-user"></i></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#edit-department"><i
                                                        data-feather="eye" class="info-img"></i>View</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item confirm-text mb-0"><i
                                                        data-feather="trash-2" class="info-img"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-info department-profile-info">
                                <div class="profile-pic">
                                    <img src="{{ URL::asset('/build/img/users/user-13.jpg') }}" alt="">
                                </div>
                                <h4>Month Name</h4>
                            </div>
                            <ul class="team-members">
                                <li>
                                    Total Orders: 07
                                </li>
                                <li>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);"><img
                                                    src="{{ URL::asset('/build/img/users/user-03.jpg') }}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"><img
                                                    src="{{ URL::asset('/build/img/users/user-04.jpg') }}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"><img
                                                    src="{{ URL::asset('/build/img/users/user-06.jpg') }}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"><img
                                                    src="{{ URL::asset('/build/img/users/user-05.jpg') }}"
                                                    alt=""><span>+3</span></a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
@endsection
