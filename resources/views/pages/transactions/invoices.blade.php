<?php $page = 'department-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Invoices
                @endslot
                @slot('li_1')
                    Manage your invoices
                @endslot
                @slot('li_2')
                    Add New Department
                @endslot
            @endcomponent

           
        </div>
    </div>
@endsection
