
<div class="page-header">
    <div class="add-item d-flex">
        <div class="page-title">
            <h4>{{ $title }}</h4>
            <h6>{{ $li_1 }}</h6>
        </div>
    </div>
    <ul class="table-top-head">
        <!-- <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                    src="{{ URL::asset('/build/img/icons/pdf.svg') }}" alt="img"></a>
        </li> -->
        @if (Route::is(['transactions', 'users']))
            <li>
                <a href="{{ route(Route::currentRouteName() . '.download') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel">
                    <img src="{{ URL::asset('/build/img/icons/excel.svg') }}" alt="img">
                </a>
            </li>
        @endif

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
    @if (Route::is(['documents']))
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-document-modal">
            <i data-feather="plus-circle" class="me-2"></i> Document
        </a>
    </div>
    @endif
    @if (Route::is(['expenses']))
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-expense-modal">
            <i data-feather="plus-circle" class="me-2"></i> Expense
        </a>
    </div>
    @endif
    @if (Route::is(['services']))
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-service-modal">
            <i data-feather="plus-circle" class="me-2"></i> Service
        </a>
    </div>
    @endif
    @if (Route::is(['orders']))
    <div class="page-btn">
        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-order-modal">
            <i data-feather="plus-circle" class="me-2"></i> Order
        </a>
    </div>
    @endif
    
    @if (Route::is(['transactions']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-transaction-modal"><i
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
