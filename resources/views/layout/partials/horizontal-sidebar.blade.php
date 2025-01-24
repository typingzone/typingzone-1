
<div class="sidebar horizontal-sidebar">
    <div id="sidebar-menu-3" class="sidebar-menu">
        <ul class="nav">
            <li class="submenu">
                <a href="{{ url('index') }}"
                    class="{{ Request::is('index', '/', 'sales-dashboard', 'video-call', 'audio-call', 'call-history', 'chat', 'calendar', 'email', 'todo', 'notes', 'file-manager', 'file-archived','file-document','file-favourites','file-manager-seleted','file-recent','file-shared') ? 'active subdrop' : '' }}"><i
                        data-feather="grid"></i><span> Main Menu</span>
                    <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}"><span>Dashboard</span>
                            <span class="menu-arrow"></span></a>
                       
                    </li>
                    
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('product-list','product-details','edit-product','add-product', 'expired-products', 'low-stocks', 'category-list', 'sub-categories', 'brand-list', 'units', 'varriant-attributes', 'warranty', 'barcode', 'qrcode') ? 'active subdrop' : '' }}"><img
                        src="{{ URL::asset('/build/img/icons/product.svg')}}" alt="img"><span> FINANCE & SERVICES
                    </span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ url('product-list') }}"class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><span>Applications</span></a></li>
                    <li><a href="{{ url('add-product') }}"class="{{ Request::is('add-product','edit-product') ? 'active' : '' }}"><span>Expenses</span></a></li>
                    <li><a href="{{ url('expired-products') }}"class="{{ Request::is('expired-products') ? 'active' : '' }}"><span>Documents</span></a></li>
                    <li><a href="{{ url('low-stocks') }}"class="{{ Request::is('low-stocks') ? 'active' : '' }}"><span>Invoices</span></a></li>
                    <li><a href="{{ url('category-list') }}"class="{{ Request::is('category-list') ? 'active' : '' }}"><span>Tasks</span></a></li>
                    <li><a href="{{ url('sub-categories') }}"class="{{ Request::is('sub-categories') ? 'active' : '' }}"><span>Credentials</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('sales-list', 'invoice-report', 'sales-returns', 'quotation-list', 'pos', 'coupons', 'purchase-list', 'purchase-order-report', 'purchase-returns', 'manage-stocks', 'stock-adjustment', 'stock-transfer', 'expense-list', 'expense-category') ? 'active subdrop' : '' }}"><img
                        src="{{ URL::asset('/build/img/icons/purchase1.svg')}}" alt="img"><span>ADMINISTRATION</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('sales-list', 'invoice-report', 'sales-returns', 'quotation-list', 'pos', 'coupons') ? 'active subdrop' : '' }}"><span>Sales</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('sales-list') }}" class="{{ Request::is('sales-list') ? 'active' : '' }}"><span>Guide Line</span></a></li>
                            <li><a href="{{ url('invoice-report') }}" class="{{ Request::is('invoice-report') ? 'active' : '' }}"><span>Calendar</span></a> </li>
                            <li><a href="{{ url('sales-returns') }}" class="{{ Request::is('sales-returns') ? 'active' : '' }}"><span>Activity Log</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
