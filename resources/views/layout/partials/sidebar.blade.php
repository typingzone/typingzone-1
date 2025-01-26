<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <!-- Main Menu Section -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main Menu</h6>
                    <ul>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ Request::is('calendar') ? 'active' : '' }}">
                            <a href="{{ url('calendar') }}"><i data-feather="calendar"></i><span>Calendar</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Finance & Services Section -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">FINANCE & SERVICES</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="smartphone"></i><span>Transactions</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('transaction-types') }}">Transaction Types</a></li>
                                <li><a href="calendar.html">Transaction Histories</a></li>
                                <li><a href="email.html">Archived Transaction</a></li>
                                <li><a href="todo.html">Invoices</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="file-text"></i><span>Documents</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chat.html">Manage Documents</a></li>
                                <li><a href="calendar.html">Document Names</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="box"></i><span>Orders</span></a>
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

                <!-- Administration Section -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">ADMINISTRATION</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="users"></i><span>Users</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chat.html">Manage Users</a></li>
                                <li><a href="calendar.html">Roles & Permissions</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="settings"></i><span>Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chat.html">General Settings</a></li>
                                <li><a href="calendar.html">Notification Preferences</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="book-open"></i><span>User Guide</span></a>
                        </li>
                        
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="mail"></i><span>Email Templates</span></a>
                        </li>

                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="bell"></i><span>Reminders</span></a>
                        </li>

                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="briefcase"></i><span>Office Assets</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Extras Section -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">EXTRAS</h6>
                    <ul>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}">
                            <a href="{{ url('product-list') }}"><i data-feather="activity"></i><span>Login Activities</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
