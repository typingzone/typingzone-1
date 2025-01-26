<?php $page = 'Login Activities'; ?>
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
                @slot('li_2')
                    Add New Department
                @endslot
            @endcomponent

           
        </div>
    </div>
@endsection
