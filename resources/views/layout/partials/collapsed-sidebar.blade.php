<!-- Sidebar -->
<div class="sidebar collapsed-sidebar" id="collapsed-sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu-2" class="sidebar-menu sidebar-menu-three">
            <aside id="aside" class="ui-aside">
                <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('dashboard', 'calendar') ? 'active' : '' }}" href="#home" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" role="tab" aria-selected="true">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('transactions', 'archived-transactions', 'orders', 'tickets', 'expenses') ? 'active' : '' }}" href="#transactions" id="transactions-tab" data-bs-toggle="tab"
                            data-bs-target="#transactions" role="tab" aria-selected="false">
                            <i data-feather="shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('documents', 'document-names', 'services', 'invoices') ? 'active' : '' }}" href="#documents" id="documents-tab" data-bs-toggle="tab"
                            data-bs-target="#documents" role="tab" aria-selected="false">
                            <i data-feather="file-text"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('manage-users', 'role-permission', 'notes', 'guides', 'email-templates', 'reminders') ? 'active' : '' }}" href="#admin" id="admin-tab" data-bs-toggle="tab"
                            data-bs-target="#admin" role="tab" aria-selected="true">
                            <i data-feather="users"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="tablinks nav-link {{ Request::is('login-activities') ? 'active' : '' }}" href="#activities" id="activities-tab" data-bs-toggle="tab"
                            data-bs-target="#activities" role="tab" aria-selected="true">
                            <i data-feather="activity"></i>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="tab-content tab-content-four pt-2">
                <ul class="tab-pane {{ Request::is('dashboard', 'calendar') ? 'active' : '' }}" id="home" aria-labelledby="home-tab">
                    <li class="submenu">
                        <a href="javascript:void(0);" class="{{ Request::is('dashboard') ? 'active subdrop' : '' }}"><span>Dashboard</span>
                            </a>
                    </li>
                    <li><a href="{{ url('calendar') }}" class="{{ Request::is('calendar') ? 'active' : '' }}"><span>Calendar</span></a></li>
                </ul>

                <ul class="tab-pane {{ Request::is('transactions', 'archived-transactions', 'orders', 'tickets', 'expenses') ? 'active' : '' }}" id="transactions" aria-labelledby="transactions-tab">
                    <li><a href="{{ url('transactions') }}" class="{{ Request::is('transactions') ? 'active' : '' }}"><span>Transactions</span></a></li>
                    <li><a href="{{ url('archived-transactions') }}" class="{{ Request::is('archived-transactions') ? 'active' : '' }}"><span>Archived Transactions</span></a></li>
                    <li><a href="{{ url('orders') }}" class="{{ Request::is('orders') ? 'active' : '' }}"><span>Orders</span></a></li>
                    <li><a href="{{ url('tickets') }}" class="{{ Request::is('tickets') ? 'active' : '' }}"><span>Tickets</span></a></li>
                    <li><a href="{{ url('expenses') }}" class="{{ Request::is('expenses') ? 'active' : '' }}"><span>Expenses</span></a></li>
                </ul>

                <ul class="tab-pane {{ Request::is('documents', 'document-names', 'services', 'invoices') ? 'active' : '' }}" id="documents" aria-labelledby="documents-tab">
                    <li><a href="{{ url('documents') }}" class="{{ Request::is('documents') ? 'active' : '' }}"><span>Documents</span></a></li>
                    <li><a href="{{ url('document-names') }}" class="{{ Request::is('document-names') ? 'active' : '' }}"><span>Document Names</span></a></li>
                    <li><a href="{{ url('services') }}" class="{{ Request::is('services') ? 'active' : '' }}"><span>Services</span></a></li>
                    <li><a href="{{ url('invoices') }}" class="{{ Request::is('invoices') ? 'active' : '' }}"><span>Invoices</span></a></li>
                </ul>

                <ul class="tab-pane {{ Request::is('manage-users', 'role-permission', 'notes', 'guides', 'email-templates', 'reminders') ? 'active' : '' }}" id="admin" aria-labelledby="admin-tab">
                    <li><a href="{{ url('manage-users') }}" class="{{ Request::is('manage-users') ? 'active' : '' }}"><span>Manage Users</span></a></li>
                    <li><a href="{{ url('role-permission') }}" class="{{ Request::is('role-permission') ? 'active' : '' }}"><span>Roles & Permissions</span></a></li>
                    <li><a href="{{ url('notes') }}" class="{{ Request::is('notes') ? 'active' : '' }}"><span>Notes</span></a></li>
                    <li><a href="{{ url('guides') }}" class="{{ Request::is('guides') ? 'active' : '' }}"><span>Guides</span></a></li>
                    <li><a href="{{ url('email-templates') }}" class="{{ Request::is('email-templates') ? 'active' : '' }}"><span>Email Templates</span></a></li>
                    <li><a href="{{ url('reminders') }}" class="{{ Request::is('reminders') ? 'active' : '' }}"><span>Reminders</span></a></li>
                </ul>

                <ul class="tab-pane {{ Request::is('login-activities') ? 'active' : '' }}" id="activities" aria-labelledby="activities-tab">
                    <li><a href="{{ url('login-activities') }}" class="{{ Request::is('login-activities') ? 'active' : '' }}"><span>Login Activities</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Sidebar -->
