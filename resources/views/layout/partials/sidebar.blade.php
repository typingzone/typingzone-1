<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main Menu</h6>
                    <ul>
                        <li class="{{ Request::routeIs('product-list', 'product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ Request::routeIs('calendar') ? 'active' : '' }}">
                            <a href="{{ route('calendar') }}"><i data-feather="calendar"></i><span>Calendar</span></a>
                        </li>
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">FINANCE & SERVICES</h6>
                    <ul>
                        <li class="submenu {{ Request::routeIs('transaction-types', 'transaction-history', 'archived-transactions', 'invoices') ? 'active' : '' }}">
                            <a href="javascript:void(0);"><i data-feather="smartphone"></i><span>Transactions</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('transaction-types') }}">Transaction Types</a></li>
                                <li><a href="{{ route('transaction-history') }}">Transaction History</a></li>
                                <li><a href="{{ route('archived-transactions') }}">Archived Transactions</a></li>
                                <li><a href="{{ route('invoices') }}">Invoices</a></li>
                            </ul>
                        </li>

                        <li class="submenu {{ Request::routeIs('documents', 'document-names') ? 'active' : '' }}">
                            <a href="javascript:void(0);"><i data-feather="file-text"></i><span>Documents</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('documents') }}">Documents</a></li>
                                <li><a href="{{ route('document-names') }}">Document Names</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::routeIs('orders') ? 'active' : '' }}">
                            <a href="{{ route('orders') }}"><i data-feather="box"></i><span>Orders</span></a>
                        </li>

                        <li class="{{ Request::routeIs('tickets') ? 'active' : '' }}">
                            <a href="{{ route('tickets') }}"><i class="fa fa-ticket"></i><span style="padding-left: 7px">Tickets</span></a>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="tool"></i><span>Tools</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chat.html">Image to PDF</a></li>
                                <li><a href="calendar.html">PDF To Image</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="layout"></i><span>Invoices Design</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chat.html">Colors Picker</a></li>
                                <li><a href="calendar.html">Invoices Design</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">ADMINISTRATION</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="users"></i><span>Users</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('manage-users') }}">Manage Users</a></li>
                                <li><a href="{{ route('role-permission') }}">Roles & Permissions</a></li>
                            </ul>
                        </li>

                        <li class="submenu {{ Request::routeIs('general-settings', 'notification-preferences') ? 'active' : '' }}">
                            <a href="javascript:void(0);"><i data-feather="settings"></i><span>Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('general-settings') }}">General Settings</a></li>
                                <li><a href="{{ route('notification-preferences') }}">Notification Preferences</a></li>
                            </ul>
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

                        <li class="{{ Request::routeIs('assets') ? 'active' : '' }}">
                            <a href="{{ route('assets') }}"><i data-feather="briefcase"></i><span>Office Assets</span></a>
                        </li>
                    </ul>
                </li>

                <li class="submenu-open">
                    <h6 class="submenu-hdr">EXTRAS</h6>
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
