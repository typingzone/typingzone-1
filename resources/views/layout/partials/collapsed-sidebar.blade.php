<!-- Sidebar -->
<div class="sidebar collapsed-sidebar" id="collapsed-sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu-2" class="sidebar-menu sidebar-menu-three">
            <aside id="aside" class="ui-aside">
                <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('index', '/', 'sales-dashboard', 'video-call', 'audio-call', 'call-history', 'chat', 'calendar', 'email', 'todo', 'notes', 'file-manager', 'file-archived','file-document','file-favourites','file-manager-seleted','file-recent','file-shared','file-manager-deleted') ? 'active' : '' }}" href="#home" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" role="tab" aria-selected="true">
                            <img src="{{ URL::asset('/build/img/icons/menu-icon.svg')}}" alt="">
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('product-list','product-details' ,'edit-product','add-product', 'expired-products', 'low-stocks', 'category-list', 'sub-categories', 'brand-list', 'units', 'varriant-attributes', 'warranty', 'barcode', 'qrcode') ? 'active' : '' }}" href="#messages" id="messages-tab" data-bs-toggle="tab"
                            data-bs-target="#product" role="tab" aria-selected="false">
                            <img src="{{ URL::asset('/build/img/icons/product.svg')}}" alt="">
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('sales-list','sales-returns', 'quotation-list', 'pos', 'coupons') ? 'active' : '' }}" href="#profile" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#sales" role="tab" aria-selected="false">
                            <img src="{{ URL::asset('/build/img/icons/sales1.svg')}}" alt="">
                        </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('expense-list','expense-category','purchase-list', 'purchase-order-report', 'purchase-returns', 'manage-stocks', 'stock-adjustment', 'stock-transfer') ? 'active' : '' }}" href="#report" id="report-tab" data-bs-toggle="tab"
                            data-bs-target="#purchase" role="tab" aria-selected="true">
                            <img src="{{ URL::asset('/build/img/icons/purchase1.svg')}}" alt="">
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('customers', 'suppliers', 'store-list', 'warehouse') ? 'active' : '' }}" href="#set" id="set-tab" data-bs-toggle="tab"
                            data-bs-target="#user" role="tab" aria-selected="true">
                            <img src="{{ URL::asset('/build/img/icons/users1.svg')}}" alt="">
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('employees-grid', 'employees-list','edit-employee','add-employee','department-grid', 'department-list','designation', 'shift', 'attendance-employee', 'attendance-admin', 'leaves-admin', 'leaves-employee', 'leave-types', 'holidays','payroll-list') ? 'active' : '' }}" href="#set2" id="set-tab2" data-bs-toggle="tab"
                            data-bs-target="#employee" role="tab" aria-selected="true">
                            <img src="{{ URL::asset('/build/img/icons/calendars.svg')}}" alt="">
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('sales-report', 'purchase-report', 'inventory-report', 'invoice-report', 'supplier-report', 'customer-report', 'expense-report', 'income-report', 'tax-reports', 'profit-and-loss') ? 'active' : '' }}" href="#set3" id="set-tab3" data-bs-toggle="tab"
                            data-bs-target="#report" role="tab" aria-selected="true">
                            <img src="{{ URL::asset('/build/img/icons/printer.svg')}}" alt="">
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('tables-basic','data-tables','form-wizard','form-select2','form-validation','form-floating-labels','form-vertical','form-horizontal','form-basic-inputs','form-checkbox-radios','form-input-groups','form-grid-gutters','form-select','form-mask','form-fileupload','icon-fontawesome','icon-feather','icon-ionic','icon-material','icon-pe7','icon-simpleline','icon-themify','icon-weather','icon-typicon','icon-flag','chart-apex','chart-c3','chart-js','chart-morris','chart-flot','chart-peity','roles-permissions','permissions','delete-account','users','ui-alerts','ui-accordion','ui-avatar','ui-badges','ui-borders','ui-buttons','ui-buttons-group','ui-breadcrumb','ui-cards','ui-carousel','ui-colors','ui-dropdowns','ui-grid','ui-images','ui-lightbox','ui-modals','ui-media','ui-offcanvas','ui-pagination','ui-popovers','ui-progress','ui-placeholders','ui-rangeslider','ui-spinner','ui-sweetalerts','ui-nav-tabs','ui-toasts','ui-tooltips','ui-typography','ui-video','ui-ribbon','ui-clipboard','ui-drag-drop','ui-rating','ui-text-editor','ui-counter','ui-scrollbar','ui-stickynote','ui-timeline')? 'active': '' }}" href="#set4" id="set-tab4" data-bs-toggle="tab"
                            data-bs-target="#document" role="tab" aria-selected="true">
                            <i data-feather="file-minus"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('countries', 'states', 'blank-page') ? 'active' : '' }}" href="#set5" id="set-tab6" data-bs-toggle="tab"
                            data-bs-target="#permission" role="tab" aria-selected="true">
                            <i data-feather="user"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps', 'system-settings', 'company-settings', 'localization-settings', 'prefixes', 'preference', 'appearance', 'social-authentication', 'language-settings', 'language-settings-web','invoice-settings', 'printer-settings', 'pos-settings', 'custom-fields', 'email-settings', 'sms-gateway', 'otp-settings', 'gdpr-settings', 'payment-gateway-settings', 'bank-settings-grid', 'bank-settings-list','tax-rates', 'currency-settings', 'storage-settings', 'ban-ip-address','activities') ? 'active' : '' }}" href="#set6" id="set-tab5" data-bs-toggle="tab"
                            data-bs-target="#settings" role="tab" aria-selected="true">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="tab-content tab-content-four pt-2">
                <ul class="tab-pane {{ Request::is('index', '/', 'sales-dashboard', 'video-call', 'audio-call', 'call-history', 'chat', 'calendar', 'email', 'todo', 'notes', 'file-manager', 'file-archived','file-document','file-favourites','file-manager-seleted','file-recent','file-shared','file-manager-deleted') ? 'active' : '' }}"
                    id="home" aria-labelledby="home-tab">
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}"><span>Dashboard</span>
                            <span class="menu-arrow"></span></a>
                    </li>
                   
                </ul>
                <ul class="tab-pane {{ Request::is('product-list','product-details', 'edit-product','add-product', 'expired-products', 'low-stocks', 'category-list', 'sub-categories', 'brand-list', 'units', 'varriant-attributes', 'warranty', 'barcode', 'qrcode') ? 'active' : '' }}"
                    id="product" aria-labelledby="messages-tab">
                    <li><a href="{{ url('product-list') }}" class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><span>Products</span></a></li>
                    <li><a href="{{ url('expired-products') }}" class="{{ Request::is('expired-products') ? 'active' : '' }}"><span>Expired Products</span></a></li>
                </ul>
               
                <ul class="tab-pane {{ Request::is('tables-basic','data-tables','form-wizard','form-select2','form-validation','form-floating-labels','form-vertical','form-horizontal','form-basic-inputs','form-checkbox-radios','form-input-groups','form-grid-gutters','form-select','form-mask','form-fileupload','icon-fontawesome','icon-feather','icon-ionic','icon-material','icon-pe7','icon-simpleline','icon-themify','icon-weather','icon-typicon','icon-flag','chart-apex','chart-c3','chart-js','chart-morris','chart-flot','chart-peity','roles-permissions','permissions','delete-account','users','ui-alerts','ui-accordion','ui-avatar','ui-badges','ui-borders','ui-buttons','ui-buttons-group','ui-breadcrumb','ui-cards','ui-carousel','ui-colors','ui-dropdowns','ui-grid','ui-images','ui-lightbox','ui-modals','ui-media','ui-offcanvas','ui-pagination','ui-popovers','ui-progress','ui-placeholders','ui-rangeslider','ui-spinner','ui-sweetalerts','ui-nav-tabs','ui-toasts','ui-tooltips','ui-typography','ui-video','ui-ribbon','ui-clipboard','ui-drag-drop','ui-rangeslider','ui-rating','ui-text-editor','ui-counter','ui-scrollbar','ui-stickynote','ui-timeline')? 'active': '' }}"
                    id="permission" aria-labelledby="set-tab4">
                    <li><a href="{{ url('users') }}" class="{{ Request::is('users') ? 'active' : '' }}"><span>Users</span></a></li>
                    <li><a href="{{ url('roles-permissions') }}" class="{{ Request::is('roles-permissions','permissions') ? 'active' : '' }}"><span>Roles & Permissions</span></a></li>
                    <li><a href="{{ url('delete-account') }}" class="{{ Request::is('delete-account') ? 'active' : '' }}"><span>Delete Account Request</span></a></li>

                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('ui-alerts', 'ui-accordion', 'ui-avatar', 'ui-badges', 'ui-borders', 'ui-buttons', 'ui-buttons-group', 'ui-breadcrumb', 'ui-cards', 'ui-carousel', 'ui-colors', 'ui-dropdowns', 'ui-grid', 'ui-images', 'ui-lightbox', 'ui-modals', 'ui-media', 'ui-offcanvas', 'ui-pagination', 'ui-popovers', 'ui-progress', 'ui-placeholders', 'ui-rangeslider', 'ui-spinner', 'ui-sweetalerts', 'ui-nav-tabs', 'ui-toasts', 'ui-tooltips', 'ui-typography', 'ui-video') ? 'active subdrop' : '' }}">
                            <span>Base UI</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="{{ url('ui-alerts') }}" class="{{ Request::is('ui-alerts') ? 'active' : '' }}">Alerts</a></li>
                            <li><a href="{{ url('ui-accordion') }}" class="{{ Request::is('ui-accordion') ? 'active' : '' }}">Accordion</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('ui-ribbon', 'ui-clipboard', 'ui-drag-drop', 'ui-rating', 'ui-text-editor', 'ui-counter', 'ui-scrollbar', 'ui-stickynote', 'ui-timeline') ? 'active subdrop' : '' }}">
                            <span>Advanced UI</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="{{ url('ui-ribbon') }}" class="{{ Request::is('ui-ribbon') ? 'active' : '' }}">Ribbon</a></li>
                            <li><a href="{{ url('ui-clipboard') }}" class="{{ Request::is('ui-clipboard') ? 'active' : '' }}">Clipboard</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('form-wizard', 'form-select2', 'form-validation', 'form-floating-labels', 'form-vertical', 'form-horizontal', 'form-basic-inputs', 'form-checkbox-radios', 'form-input-groups', 'form-grid-gutters', 'form-select', 'form-mask', 'form-fileupload') ? 'active' : '' }}">
                            <span>Forms</span><span class="menu-arrow"></span>
                        </a>
                       
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Sidebar -->
