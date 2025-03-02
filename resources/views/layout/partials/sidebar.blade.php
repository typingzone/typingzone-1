<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- <li class="submenu-open">
                    <ul>
                        <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                           <input type="text" class="form-control" placeholder="Search...">
                        </li>
                    </ul>
                </li> -->

                {{-- MAIN MENU --}}
                <li class="submenu-open">
                    <h6 class="submenu-hdr">MAIN MENU</h6>
                    <ul>
                        <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('dashboard') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>

                        {{-- Check for any permissions related to calendar --}}
                        @can('Calendar view')
                        <li class="{{ Request::routeIs('calendar') ? 'active' : '' }}">
                            <a href="{{ route('calendar') }}"><i data-feather="calendar"></i><span>Calendar</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>

                {{-- TRANSACTIONS & ORDERS --}}
                @canany(['Transactions view', 'Archived Transactions view', 'Orders view', 'Archived Orders view', 'Invoices view', 'Invoice Templates view', 'Tickets view', 'Expenses view'])
                <li class="submenu-open">
                    <h6 class="submenu-hdr">TRANSACTIONS & ORDERS</h6>
                    <ul>

                        {{-- Transactions Dropdown --}}
                        @canany(['Transactions view', 'Archived Transactions view'])
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('transactions', 'archived-transactions') ? 'subdrop active' : '' }}"><i data-feather="smartphone"></i><span>Transactions</span><span class="menu-arrow"></span></a>
                            <ul>
                                @can('Transactions view')
                                <li><a href="{{ route('transactions') }}" class="{{ Request::routeIs('transactions') ? 'active' : '' }}">Transactions</a></li>
                                @endcan
                                @can('Archived Transactions view')
                                <li><a href="{{ route('archived-transactions') }}" class="{{ Request::routeIs('archived-transactions') ? 'active' : '' }}">Archived Transactions</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        {{-- Orders Dropdown --}}
                        @canany(['Orders view', 'Archived Orders view'])
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('orders', 'archived-orders') ? 'subdrop active' : '' }}"><i data-feather="box"></i><span>Orders</span><span class="menu-arrow"></span></a>
                            <ul>
                                @can('Orders view')
                                <li><a href="{{ route('orders') }}" class="{{ Request::routeIs('orders') ? 'active' : '' }}">Orders</a></li>
                                @endcan
                                @can('Archived Orders view')
                                <li><a href="{{ route('archived-orders') }}" class="{{ Request::routeIs('archived-orders') ? 'active' : '' }}">Archived Orders</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['Invoices view', 'Invoices Templates view'])
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('invoices', 'invoice-templates') ? 'subdrop active' : '' }}"><i data-feather="layout"></i><span>Invoices</span><span class="menu-arrow"></span></a>
                            <ul>
                                @can('Invoices view')
                                <li><a href="{{ route('invoices') }}" class="{{ Request::routeIs('invoices') ? 'active' : '' }}">Invoices</a></li>
                                @endcan
                                @can('Invoices Templates view')
                                <li><a href="{{ route('invoice-templates') }}" class="{{ Request::routeIs('invoice-templates') ? 'active' : '' }}">Invoices Templates</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @can('Tickets view')
                        <li class="{{ Request::routeIs('tickets') ? 'active' : '' }}">
                            <a href="{{ route('tickets') }}"><i data-feather="check-square"></i><span>Tickets</span></a>
                        </li>
                        @endcan

                        @can('Expenses view')
                        <li class="{{ Request::routeIs('expenses') ? 'active' : '' }}">
                            <a href="{{ route('expenses') }}"><i data-feather="dollar-sign"></i><span>Expenses</span></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcanany

                {{-- DOCUMENTS & SERVICES --}}
                @canany(['Documents view', 'Document Names view', 'Services view'])
                <li class="submenu-open">
                    <h6 class="submenu-hdr">DOCUMENTS & SERVICES</h6>
                    <ul>

                        {{-- Documents Dropdown --}}
                        @canany(['Documents view', 'Document Names view'])
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('documents', 'document-names') ? 'subdrop active' : '' }}"><i data-feather="file-text"></i><span>Documents</span><span class="menu-arrow"></span></a>
                            <ul>
                                @can('Documents view')
                                <li><a href="{{ route('documents') }}" class="{{ Request::routeIs('documents') ? 'active' : '' }}">Documents</a></li>
                                @endcan
                                @can('Document Names view')
                                <li><a href="{{ route('document-names') }}" class="{{ Request::routeIs('document-names') ? 'active' : '' }}">Document Names</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        {{-- Services --}}
                        @can('Services view')
                        <li class="{{ Request::routeIs('services') ? 'active' : '' }}">
                            <a href="{{ route('services') }}"><i data-feather="briefcase"></i><span>Services</span></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcanany

                {{-- USERS & SETTINGS --}}
                @canany(['Manage Users view', 'Roles & Permissions view', 'Notes view', 'Guides view', 'Reminders view', 'Login Activities view', 'Log Activities view'])
                <li class="submenu-open">
                    <h6 class="submenu-hdr">USERS & SETTINGS</h6>
                    <ul>

                        {{-- Users Dropdown --}}
                        @canany(['Manage Users view', 'Roles & Permissions view'])
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('manage-users', 'role-permission') ? 'subdrop active' : '' }}"><i data-feather="users"></i><span>Users</span><span class="menu-arrow"></span></a>
                            <ul>
                                @can('Manage Users view')
                                <li><a href="{{ route('manage-users') }}" class="{{ Request::routeIs('manage-users') ? 'active' : '' }}">Manage Users</a></li>
                                @endcan
                                @can('Roles & Permissions view')
                                <li><a href="{{ route('role-permission') }}" class="{{ Request::routeIs('role-permission') ? 'active' : '' }}">Roles & Permissions</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        {{-- Notes --}}
                        @can('Notes view')
                        <li class="{{ Request::routeIs('notes') ? 'active' : '' }}">
                            <a href="{{ route('notes') }}"><i data-feather="file-text"></i><span>Notes</span></a>
                        </li>
                        @endcan

                        {{-- Guides --}}
                        @can('Guides view')
                        <li class="{{ Request::routeIs('guides') ? 'active' : '' }}">
                            <a href="{{ route('guides') }}"><i data-feather="book-open"></i><span>Guides</span></a>
                        </li>
                        @endcan

                        {{-- Reminders --}}
                        @can('Reminders view')
                        <li class="{{ Request::routeIs('reminders') ? 'active' : '' }}">
                            <a href="{{ route('reminders') }}"><i data-feather="bell"></i><span>Reminders</span></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcanany

                {{-- ACTIVITIES --}}
                @canany(['Log Activities view', 'Login Activities view'])
                <li class="submenu-open">
                    <h6 class="submenu-hdr">ACTIVITIES</h6>
                    <ul>
                        @can('Website Setup view')
                        <li class="{{ Request::routeIs('website-setup') ? 'active' : '' }}">
                            <a href="{{ route('website-setup') }}"><i data-feather="globe"></i><span>Website Setup</span></a>
                        </li>
                        @endcan
                        @can('Log Activities view')
                        <li class="{{ Request::routeIs('log-activities') ? 'active' : '' }}">
                            <a href="{{ route('log-activities') }}"><i data-feather="clock"></i><span>Log Activities</span></a>
                        </li>
                        @endcan
                        @can('Login Activities view')
                        <li class="{{ Request::routeIs('login-activities') ? 'active' : '' }}">
                            <a href="{{ route('login-activities') }}"><i data-feather="activity"></i><span>Login Activities</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

            </ul>
        </div>
    </div>
</div>
