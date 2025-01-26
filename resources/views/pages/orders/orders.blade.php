<?php $page = 'department-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Orders
                @endslot
                @slot('li_1')
                    Manage your orders
                @endslot
                @slot('li_2')
                    Add New Department
                @endslot
            @endcomponent

           
        </div>
    </div>
@endsection
