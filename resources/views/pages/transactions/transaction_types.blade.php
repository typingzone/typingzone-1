<?php $page = 'transaction-types'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Transaction Types
                @endslot
                @slot('li_1')
                    Manage Transaction Types
                @endslot
                @slot('li_2')
                    product-list
                @endslot
                @slot('li_3')
                    Back to Product
                @endslot
            @endcomponent
           

        </div>
    </div>
@endsection
