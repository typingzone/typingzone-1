@extends('layout.mainlayout')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Documents
                @endslot
                @slot('li_1')
                    Manage your documents
                @endslot
            @endcomponent

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm datanew table-striped">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Document Name</th>
                                <th>Expiry Date</th>
                                <th>Uploaded By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $key => $document)
                                <tr data-row-id="{{ $document->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $document->documentName->document_name ?? 'N/A' }}</td>
                                    <td>{{ $document->expiry_date}}</td>
                                    <td><span class="badge badge-linesuccess">{{ $document->user->name ?? 'Default' }}</span></td> 
                                    <td>{{ $document->created_at->diffForHumans() }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action d-flex justify-content-start">
                                            <a class="me-2 p-2" href="javascript:void(0);" data-id="{{ $document->id }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="me-2 p-2 delete-document" href="javascript:void(0);" data-id="{{ $document->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a class="p-2" href="{{ asset('storage/' . $document->file) }}" download>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        var uploadDocumentUrl = "{{ route('documents.store') }}";
    </script>
    <script src="{{ asset('custom/js/documents.js') }}"></script>
@endsection
