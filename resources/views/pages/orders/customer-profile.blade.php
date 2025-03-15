<?php $page = 'Customer Profile'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Customer Profile
                @endslot
                @slot('li_1')
                    Manage your Customer Profile
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; overflow: hidden;">
                        <div style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); padding: 20px; text-align: center;">
                            <div style="width: 80px; height: 80px; background-color: #fff; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                <span style="font-size: 32px; color: #4e73df; font-weight: bold;">{{ substr($profileData->customer_name, 0, 1) }}</span>
                            </div>
                            <h4 style="color: #fff; margin-bottom: 5px;">{{ $profileData->customer_name }}</h4>
                            <span style="display: inline-block; background: yellow; padding: 3px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                {{ $profileData->status }}
                            </span>
                        </div>
                        <div class="card-body" style="padding: 0;">
                            <ul class="list-group list-group-flush" style="border-radius: 0;">
                                <li class="list-group-item" style="border-left: none; border-right: none; display: flex; align-items: center;">
                                    <i class="fas fa-phone-alt" style="color: #4e73df; margin-right: 15px; width: 18px;"></i>
                                    <div>
                                        <small style="display: block; color: #6c757d; font-size: 12px;">Phone</small>
                                        <span style="font-weight: 600;">{{ $profileData->phone_number }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item" style="border-left: none; border-right: none; display: flex; align-items: center;">
                                    <i class="fas fa-envelope" style="color: #4e73df; margin-right: 15px; width: 18px;"></i>
                                    <div>
                                        <small style="display: block; color: #6c757d; font-size: 12px;">Email</small>
                                        <span style="font-weight: 600;">{{ $profileData->email }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item" style="border-left: none; border-right: none; display: flex; align-items: center;">
                                    <i class="fas fa-user" style="color: #4e73df; margin-right: 15px; width: 18px;"></i>
                                    <div>
                                        <small style="display: block; color: #6c757d; font-size: 12px;">Assigned To</small>
                                        <span style="font-weight: 600;">{{ $profileData->assignedTo->name ?? 'N/A' }}</span>
                                    </div>
                                </li>
                            </ul>
                            <div style="padding: 15px;">
                                <button class="btn btn-primary form-control btn-block" id="markCompleteBtn" data-order-id="{{ $profileData->id }}"  style="background: linear-gradient(to right, #4e73df, #224abe); border: none; border-radius: 6px; padding: 10px; font-weight: 600; box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);">
                                    <i class="fas fa-check-circle mr-2"></i> Mark as Complete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Transactions Table Card -->
                <div class="col-md-9">
                    <div class="card" style="border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; height: 100%;">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                <h5 class="card-title" style="margin-bottom: 0; font-weight: 700; color: #3d4465;">Customer Transactions</h5>
                            </div>
                            <div class="table-responsive" style="border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.03);">
                                <table class="table table-sm datanew table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
                                    <thead>
                                        <tr style="background-color: #f8f9fc;">
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">#</th>
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">Application No</th>
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">Service</th>
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">Total Cost</th>
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">Paid By</th>
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">Pay Status</th>
                                            <th style="padding: 12px 15px; font-weight: 600; color: #6c757d; border-top: none; font-size: 13px;">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($profileData->transactions as $transaction)
                                            <tr style="transition: all 0.2s ease;">
                                                <td style="padding: 12px 15px; vertical-align: middle; font-size: 13px;">{{ $loop->iteration }}</td>
                                                <td style="padding: 12px 15px; vertical-align: middle; font-weight: 600; font-size: 13px;">{{ $transaction->application_no }}</td>
                                                <td style="padding: 12px 15px; vertical-align: middle; font-size: 13px;">{{ $transaction->service->service_name ?? 'N/A' }}</td>
                                                <td style="padding: 12px 15px; vertical-align: middle; font-weight: 600; font-size: 13px;">${{ number_format($transaction->total_cost, 2) }}</td>
                                                <td style="padding: 12px 15px; vertical-align: middle; font-size: 13px;">{{ $transaction->paid_by }}</td>
                                                <td style="padding: 12px 15px; vertical-align: middle;">
                                                    <span style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; 
                                                        background-color: {{ 
                                                            $transaction->pay_status === 'Paid' ? 'rgba(40, 167, 69, 0.1)' : 
                                                            ($transaction->pay_status === 'Pending' ? 'rgba(255, 193, 7, 0.1)' : 'rgba(220, 53, 69, 0.1)') 
                                                        }}; 
                                                        color: {{ 
                                                            $transaction->pay_status === 'Paid' ? '#28a745' : 
                                                            ($transaction->pay_status === 'Pending' ? '#ffc107' : '#dc3545') 
                                                        }};">
                                                        {{ $transaction->pay_status }}
                                                    </span>
                                                </td>
                                                <td style="padding: 12px 15px; vertical-align: middle; font-size: 13px;">{{ $transaction->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('build/Custom/js/customer_profile.js') }}"></script>
@endsection
