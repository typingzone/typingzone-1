<?php $page = 'Login Activities'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Login Activities
                @endslot
                @slot('li_1')
                    Manage your login activities
                @endslot
                @slot('li_2')
                    Add New Department
                @endslot
            @endcomponent

           
        </div>
    </div>
@endsection
