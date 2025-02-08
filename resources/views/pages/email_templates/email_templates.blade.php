@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Email Templates
                @endslot
                @slot('li_1')
                    Manage your templates
                @endslot
            @endcomponent

            <div class="row" id="templates-container">
                @foreach($templates as $template)
                <div class="col-md-4 template-card" id="template-card-{{ $template->id }}">
                    <div class="card email-card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $template->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $template->subject }}</h6>
                            <p class="card-text">{{ Str::limit($template->body, 100) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-primary edit-btn" data-id="{{ $template->id }}"><i class="fas fa-edit"></i> </button>
                            <button class="btn btn-danger delete-btn" data-id="{{ $template->id }}"><i class="fas fa-trash"></i> </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('custom/js/email_templates.js') }}"></script>
@endsection
