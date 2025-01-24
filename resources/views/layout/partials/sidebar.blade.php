<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Main Menu</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}"><i
                                    data-feather="grid"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
                        </li>
                        
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">FINANCE & SERVICES</h6>
                    <ul>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="save"></i><span>Applications</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="dollar"></i><span>Expenses</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="file"></i><span>Documents</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="file-text"></i><span>Invoices</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="box"></i><span>Tasks</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="box"></i><span>Credentials</span></a>
                        </li>
                    </ul>
                </li>             
                <li class="submenu-open">
                    <h6 class="submenu-hdr">ADMINISTRATION</h6>
                    <ul>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="box"></i><span>Guide Line</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="box"></i><span>Calendar</span></a>
                        </li>
                        <li class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><a
                                href="{{ url('product-list') }}"><i data-feather="box"></i><span>Activity Logs</span></a>
                        </li>
                    </ul>
                </li>                
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
