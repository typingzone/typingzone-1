<?php $page = 'Website Setup'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @component('components.breadcrumb')
                @slot('title')
                    Website Setup
                @endslot
                @slot('li_1')
                    Manage your Website Setup
                @endslot
            @endcomponent
            <form action="{{ route('website-setup.update') }}" method="POST" id="websiteSetupForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Services Card -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Services Management</h5>
                            </div>
                            <div class="card-body" style="height: 350px; overflow-y: auto;">
                                <div id="services-wrapper">
                                    @if($websiteSetup && $websiteSetup->our_services)
                                        @foreach(json_decode($websiteSetup->our_services) as $key => $service)
                                            <div class="input-group mb-3 service-item">
                                                <input type="text" name="our_services[]" class="form-control" value="{{ $service }}">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-danger remove-service">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" id="add-service" class="btn btn-primary mt-2">
                                    <i class="fas fa-plus"></i> Add Service
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cover Photo and Welcome Message Card -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Cover Photo & Welcome Message</h5>
                            </div>
                            <div class="card-body" style="height: 350px; overflow-y: auto;">
                                <div class="form-group mb-3">
                                    <label>Cover Photo</label>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            @if($websiteSetup && $websiteSetup->cover_photo)
                                                <img src="{{ asset($websiteSetup->cover_photo) }}" alt="Cover Photo" 
                                                    class="img-thumbnail" style="max-height: 100px;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                                    style="height: 100px; width: 200px; border: 1px dashed #ccc;">
                                                    <span class="text-muted">No image</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <input type="file" name="cover_photo" class="form-control" id="cover-photo-input">
                                            <small class="text-muted">Recommended size: 1920x600px</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Welcome Message</label>
                                    <textarea name="welcome_message" class="form-control" rows="5">{{ $websiteSetup->welcome_message ?? '' }}</textarea>
                                    <small class="text-muted">This message will be displayed on your homepage</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Us Card -->
                    <div class="col-md-6 mt-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">About Us</h5>
                            </div>
                            <div class="card-body" style="height: 350px; overflow-y: auto;">
                                <div class="form-group">
                                    <label>About Us Content</label>
                                    <textarea name="about_us" class="form-control" rows="10">{{ $websiteSetup->about_us ?? '' }}</textarea>
                                    <small class="text-muted">Describe your business, mission, and values</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs Card -->
                    <div class="col-md-6 mt-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">FAQs Management</h5>
                            </div>
                            <div class="card-body" style="height: 350px; overflow-y: auto;">
                                <div id="faqs-wrapper">
                                    @if($websiteSetup && $websiteSetup->faqs)
                                        @foreach(json_decode($websiteSetup->faqs, true) as $key => $faq)
                                            <div class="faq-item mb-4 border-bottom pb-3">
                                                <div class="form-group">
                                                    <label>Question</label>
                                                    <input type="text" name="faqs[{{ $key }}][question]" class="form-control" value="{{ $faq['question'] }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Answer</label>
                                                    <textarea name="faqs[{{ $key }}][answer]" class="form-control" rows="3">{{ $faq['answer'] }}</textarea>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger remove-faq">
                                                    <i class="fas fa-trash-alt"></i> Remove
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" id="add-faq" class="btn btn-primary mt-2">
                                    <i class="fas fa-plus"></i> Add FAQ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-light me-2">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>
                <div class="row mt-4"></div>
            </form>
        </div>
    </div>
    <script>
      let faqCounter = {{ ($websiteSetup && $websiteSetup->faqs) ? count(json_decode($websiteSetup->faqs, true)) : 0 }};
    </script>
    <script src="{{ asset('build/Custom/js/website_setup.js') }}"></script>
@endsection