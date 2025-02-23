
<div class="page-header">
    <div class="add-item d-flex">
        <div class="page-title">
            <h4>{{ $title }}</h4>
            <h6>{{ $li_1 }}</h6>
        </div>
    </div>
    <ul class="table-top-head">
        @if (Route::is(['customer-profile']))
            @can('Invoices download')
            <li>
                <a href="{{ route('invoice.download', ['order_id' => request()->route('id')]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF Invoice">
                    <img src="{{ URL::asset('/build/img/icons/pdf.svg') }}" alt="img">
                </a>
            </li>
            @endcan
        @endif
        @if (Route::is('transactions'))
            @can('Transactions download')
            <li>
                <a href="{{ route('transactions.download') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel">
                    <img src="{{ URL::asset('/build/img/icons/excel.svg') }}" alt="img">
                </a>
            </li>
            @endcan
        @endif

        @if (Route::is('expenses'))
            @can('Expenses download')
            <li>
                <a href="{{ route('expenses.download') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel">
                    <img src="{{ URL::asset('/build/img/icons/excel.svg') }}" alt="img">
                </a>
            </li>
            @endcan
        @endif

        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
        </li>
        <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
        </li>
    </ul>
    
    @if (Route::is(['login-activities']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" id="deleteSelected">
                <i data-feather="trash" class="me-2"></i> Delete
            </a>
        </div>
    @endif
    @if (Route::is(['manage-users']))
        @can('Manage Users add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-user-modal">
                <i data-feather="plus-circle" class="me-2"></i> User
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['role-permission']))
        @can('Roles & Permissions add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-role-permission-modal">
                <i data-feather="plus-circle" class="me-2"></i> Role & Permission
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['tickets']))
        @can('Tickets add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-ticket-modal">
                <i data-feather="plus-circle" class="me-2"></i> Ticket
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['guides']))
        @can('Guides add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-guide-modal">
                <i data-feather="plus-circle" class="me-2"></i> Guide
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['document-names']))
        @can('Document Names add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-document-name-modal">
                <i data-feather="plus-circle" class="me-2"></i> Name
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['notes']))
        @can('Notes add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-note-modal">
                <i data-feather="plus-circle" class="me-2"></i> Note
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['documents']))
        @can('Documents add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-document-modal">
                <i data-feather="plus-circle" class="me-2"></i> Document
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['expenses']))
        @can('Expenses add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-expense-modal">
                <i data-feather="plus-circle" class="me-2"></i> Expense
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['services']))
        @can('Services add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-service-modal">
                <i data-feather="plus-circle" class="me-2"></i> Service
            </a>
        </div>
        @endcan
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#show-quotation-modal">
                <i data-feather="info" class="me-2"></i> Quotation
            </a>
        </div>
    @endif
    @if (Route::is(['orders']))
        @can('Orders add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-order-modal">
                <i data-feather="plus-circle" class="me-2"></i> Order
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['transactions']))
        @can('Transactions add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-transaction-modal">
                <i data-feather="plus-circle" class="me-2"></i> Transaction
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['roles-permissions']))
        @can('Roles & Permissions add')
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units">
                <i data-feather="plus-circle" class="me-2"></i> Role
            </a>
        </div>
        @endcan
    @endif
    @if (Route::is(['email-templates']))
        <div class="page-btn">
            <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-template-modal">
                <i data-feather="plus-circle" class="me-2"></i> Template
            </a>
        </div>
    @endif
</div>
