<?php $page = 'Notes'; ?>
@extends('layout.mainlayout')

@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.breadcrumb')
            @slot('title')
                Manage Notes
            @endslot
            @slot('li_1')
                Manage your Notes
            @endslot
        @endcomponent

        <div class="row">
            @foreach ($notes as $note)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded-lg border-1">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">{{ $note->title }}</h5>
                        <p class="card-text">{{ $note->note }}</p>
                        <p class="text-muted">Reminder: {{ $note->reminder_date ? $note->reminder_date->format('F j, Y') : 'No reminder set' }}</p>
                        <p class="text-muted small">Created: {{ $note->created_at->diffForHumans() }}</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-sm edit-note" data-id="{{ $note->id }}" data-bs-toggle="modal" data-bs-target="#edit-note-modal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm delete-note" data-id="{{ $note->id }}">
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

<script src="{{ asset('custom/js/notes.js') }}"></script>
@endsection
