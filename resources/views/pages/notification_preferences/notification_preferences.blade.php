<?php $page = 'department-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Notification Preferences
                @endslot
                @slot('li_1')
                    Manage your notification preferences
                @endslot
                @slot('li_2')
                    Add New Department
                @endslot
            @endcomponent

           
        </div>
    </div>
@endsection
