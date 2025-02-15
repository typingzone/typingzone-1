<?php $page = 'Tutorials'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    FAQs & Tutorials
                @endslot
                @slot('li_1')
                    Help
                @endslot
            @endcomponent

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Frequently Asked Questions</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What is the purpose of this SaaS application?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            This application is designed to help typing centers manage transactions, daily records, documents, reminders for expired documents, pending transactions, and more. It streamlines the entire process and improves efficiency.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            How can I track document expiry dates?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            You can set reminders for expiring documents, and the system will notify you in advance so you can take action before any document expires.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Where are my documents stored?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            All your documents are securely stored in Amazon S3, ensuring safe and reliable storage for easy access when needed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            What does the calendar feature show?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            The calendar feature helps you track upcoming notes, such as transaction deadlines, document renewals, and scheduled tasks, giving you a clear overview of your daily activities.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Watch Tutorial Videos</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#videoModalEnglish">
                                        <i class="fas fa-play-circle"></i> Watch in English
                                    </button>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#videoModalPashto">
                                        <i class="fas fa-play-circle"></i> Watch in Pashto
                                    </button>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#videoModalUrdu">
                                        <i class="fas fa-play-circle"></i> Watch in Urdu
                                    </button>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#videoModalArabic">
                                        <i class="fas fa-play-circle"></i> Watch in Arabic
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Modals -->
            <div class="modal fade" id="videoModalEnglish" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/exampleEnglish" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="videoModalPashto" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/examplePashto" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="videoModalUrdu" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/exampleUrdu" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="videoModalArabic" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/exampleArabic" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
