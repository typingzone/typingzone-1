<?php $page = 'Invoice Templates'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.breadcrumb')
            @slot('title') Invoice Templates @endslot
            @slot('li_1') Manage your invoice Templates @endslot
        @endcomponent
        
        <div class="row">
            @foreach($templates as $template)
                <div class="col-md-4">
                    <div class="template-card {{ $template['active'] ? 'active-template' : '' }}" 
                         data-template="{{ $template['template_name'] }}">
                        <div class="card-body">
                            <img src="{{ asset('build/img/invoices/'.$template['template_name'].'.png') }}" 
                                 alt="{{ $template['template_name'] }}" 
                                 class="template-img">
                            <h5 class="card-title">{{ $template['template_name'] }}</h5>
                            <p class="active-status {{ $template['active'] ? 'active' : 'inactive' }}">
                                {{ $template['active'] ? 'Active' : 'Inactive' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{{ asset('build/Custom/js/invoice-templates.js') }}"></script>
<link href="{{ asset('build/Custom/css/invoice-templates.css') }}" rel="stylesheet">
@endsection
