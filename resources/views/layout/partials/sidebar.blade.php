<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">MAIN MENU</h6>
                    <ul>
                        <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('dashboard') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ Request::routeIs('calendar') ? 'active' : '' }}">
                            <a href="{{ route('calendar') }}"><i data-feather="calendar"></i><span>Calendar</span></a>
                        </li>
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">TRANSACTIONS & ORDERS</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('transactions', 'archived-transactions') ? 'subdrop active' : '' }}"><i data-feather="smartphone"></i><span>Transactions</span><span class="menu-arrow"></span></a>
                            <ul>
                            <li><a href="{{ route('transactions') }}" class="{{ Request::routeIs('transactions') ? 'active' : '' }}">Transactions</a></li>
                            <li><a href="{{ route('archived-transactions') }}" class="{{ Request::routeIs('archived-transactions') ? 'active' : '' }}">Archived Transactions</a></li>
                            </ul>
                        </li>


                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('orders', 'archived-orders') ? 'subdrop active' : '' }}"><i data-feather="box"></i><span>Orders</span><span class="menu-arrow"></span></a>
                            <ul>
                            <li><a href="{{ route('orders') }}" class="{{ Request::routeIs('orders') ? 'active' : '' }}">Orders</a></li>
                            <li><a href="{{ route('archived-orders') }}" class="{{ Request::routeIs('archived-orders') ? 'active' : '' }}">Archived Orders</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('invoices') ? 'subdrop active' : '' }}"><i data-feather="layout"></i><span>Invoies</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('invoices') }}" class="{{ Request::routeIs('invoices') ? 'active' : '' }}">Invoices</a></li>
                                <li><a href="{{ route('invoices') }}" class="{{ Request::routeIs('invoices') ? 'active' : '' }}">Invoices Design</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::routeIs('tickets') ? 'active' : '' }}">
                            <a href="{{ route('tickets') }}"><i data-feather="check-square"></i><span>Tickets</span></a>
                        </li>

                        <li class="{{ Request::routeIs('expenses') ? 'active' : '' }}">
                            <a href="{{ route('expenses') }}"><i data-feather="dollar-sign"></i><span>Expenses</span></a>
                        </li>
                       
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">DOCUMENTS & SERVICES</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('documents', 'document-names') ? 'subdrop active' : '' }}"><i data-feather="file-text"></i><span>Documents</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('documents') }}" class="{{ Request::routeIs('documents') ? 'active' : '' }}">Documents</a></li>
                                <li><a href="{{ route('document-names') }}" class="{{ Request::routeIs('document-names') ? 'active' : '' }}">Document Names</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::routeIs('services') ? 'active' : '' }}">
                            <a href="{{ route('services') }}"><i data-feather="briefcase"></i><span>Services</span></a>
                        </li>
                        
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">USERS & SETTINGS</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="{{ Request::routeIs('manage-users', 'role-permission') ? 'subdrop active' : '' }}"><i data-feather="users"></i><span>Users</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('manage-users') }}" class="{{ Request::routeIs('manage-users') ? 'active' : '' }}">Manage Users</a></li>
                                <li><a href="{{ route('role-permission') }}" class="{{ Request::routeIs('role-permission') ? 'active' : '' }}">Roles & Permissions</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::routeIs('notes') ? 'active' : '' }}">
                            <a href="{{ route('notes') }}"><i data-feather="file-text"></i><span>Notes</span></a>
                        </li>

                        <li class="{{ Request::routeIs('guides') ? 'active' : '' }}">
                            <a href="{{ route('guides') }}"><i data-feather="book-open"></i><span>Guides</span></a>
                        </li>

                        <li class="{{ Request::routeIs('email-templates') ? 'active' : '' }}">
                            <a href="{{ route('email-templates') }}"><i data-feather="mail"></i><span>Email Templates</span></a>
                        </li>

                        <li class="{{ Request::routeIs('reminders') ? 'active' : '' }}">
                            <a href="{{ route('reminders') }}"><i data-feather="bell"></i><span>Reminders</span></a>
                        </li>
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">ACTIVITIES</h6>
                    <ul>
                        <li class="{{ Request::routeIs('login-activities') ? 'active' : '' }}">
                            <a href="{{ route('login-activities') }}"><i data-feather="activity"></i><span>Login Activities</span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
