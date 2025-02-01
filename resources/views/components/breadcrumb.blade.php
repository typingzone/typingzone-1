@if (Route::is(['add-products']))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ $li_2 }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>{{ $li_3 }}</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>

    </div>
@endif

@if (
    !Route::is([
        'add-products',
        ]))

    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                        src="{{ URL::asset('/build/img/icons/pdf.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                        src="{{ URL::asset('/build/img/icons/excel.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer"
                        class="feather-rotate-ccw"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                        class="feather-rotate-ccw"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>
       
        @if (Route::is(['manage-users']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-user-modal">
                <i data-feather="plus-circle" class="me-2"></i> User
            </a>
        </div>
        @endif
        @if (Route::is(['role-permission']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-role-permission-modal">
                <i data-feather="plus-circle" class="me-2"></i> Role & Permission
            </a>
        </div>
        @endif
        @if (Route::is(['tickets']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-ticket-modal">
                <i data-feather="plus-circle" class="me-2"></i> Ticket
            </a>
        </div>
        @endif
        @if (Route::is(['guides']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-guide-modal">
                <i data-feather="plus-circle" class="me-2"></i> Guide
            </a>
        </div>
        @endif
        @if (Route::is(['document-names']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-document-name-modal">
                <i data-feather="plus-circle" class="me-2"></i> Name
            </a>
        </div>
        @endif
        @if (Route::is(['notes']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-note-modal">
                <i data-feather="plus-circle" class="me-2"></i> Note
            </a>
        </div>
        @endif
        @if (Route::is(['transaction-types']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New</a>
            </div>
        @endif
        @if (Route::is(['transaction-history']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-category"><i
                        data-feather="plus-circle" class="me-2"></i> Add New</a>
            </div>
        @endif
      
        @if (Route::is(['roles-permissions']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> Add New Role</a>
            </div>
        @endif
       
    </div>
@endif

@if (Route::is([
        'add-products',
    ]))
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">{{ $title }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('index') }}">{{ $li_1 }}</a></li>
                    <li class="breadcrumb-item active">{{ $li_2 }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
@endif
