<?php $page = 'Guide'; ?>
@extends('layout.mainlayout')

@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.breadcrumb')
            @slot('title')
                Manage guide
            @endslot
            @slot('li_1')
                Manage your guide
            @endslot
        @endcomponent

        <div class="row">
            @foreach ($guides as $guide)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded-lg border-1">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">{{ $guide->title }}</h5>
                        <p class="card-text">{{ $guide->description }}</p>
                        <p class="text-muted small">Created: {{ $guide->created_at->diffForHumans() }}</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-sm edit-guide" data-id="{{ $guide->id }}" data-bs-toggle="modal" data-bs-target="#edit-note-modal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm delete-guide" data-id="{{ $guide->id }}">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="{{ asset('custom/js/guides.js') }}"></script>
@endsection
