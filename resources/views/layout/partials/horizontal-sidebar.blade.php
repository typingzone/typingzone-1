<<<<<<< HEAD

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
=======
<div class="sidebar horizontal-sidebar">
  <div id="sidebar-menu-3" class="sidebar-menu">
    <ul class="nav">
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('dashboard') ? 'active subdrop' : '' }}">
          <i data-feather="grid"></i>
          <span>Main Menu</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li>
            <a href="{{ url('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
              <i data-feather="home"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{ url('calendar') }}" class="{{ Request::is('calendar') ? 'active' : '' }}">
              <i data-feather="calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('transactions', 'archived-transactions', 'expenses', 'tickets', 'orders') ? 'active subdrop' : '' }}">
          <i data-feather="box"></i>
          <span>TRANSACTIONS & ORDERS</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('transactions', 'archived-transactions') ? 'active subdrop' : '' }}">
              <i data-feather="credit-card"></i>
              <span>Transactions</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('transactions') }}" class="{{ Request::is('transactions') ? 'active' : '' }}">
                  <span>Transactions</span>
                </a>
              </li>
              <li>
                <a href="{{ url('archived-transactions') }}" class="{{ Request::is('archived-transactions') ? 'active' : '' }}">
                  <span>Archived Transactions</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ url('orders') }}" class="{{ Request::is('orders') ? 'active' : '' }}">
              <i data-feather="box"></i>
              <span>Orders</span>
            </a>
          </li>
          <li>
            <a href="{{ url('tickets') }}" class="{{ Request::is('tickets') ? 'active' : '' }}">
              <i data-feather="check-square"></i>
              <span>Tickets</span>
            </a>
          </li>
          <li>
            <a href="{{ url('expenses') }}" class="{{ Request::is('expenses') ? 'active' : '' }}">
              <i data-feather="dollar-sign"></i>
              <span>Expenses</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('documents', 'document-names', 'services') ? 'active subdrop' : '' }}">
          <i data-feather="tool"></i>
          <span>DOCUMENTS & SERVICES</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('documents', 'document-names') ? 'active subdrop' : '' }}">
              <i data-feather="file-text"></i>
              <span>Documents</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('documents') }}" class="{{ Request::is('documents') ? 'active' : '' }}">
                  <span>Documents</span>
                </a>
              </li>
              <li>
                <a href="{{ url('document-names') }}" class="{{ Request::is('document-names') ? 'active' : '' }}">
                  <span>Document Names</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ url('services') }}" class="{{ Request::is('services') ? 'active' : '' }}">
              <i data-feather="dollar-sign"></i>
              <span>Services</span>
            </a>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('invoices') ? 'active subdrop' : '' }}">
              <i data-feather="credit-card"></i>
              <span>Invoices</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('invoices') }}" class="{{ Request::is('invoices') ? 'active' : '' }}">
                  <span>Invoices</span>
                </a>
              </li>
              <li>
                <a href="{{ url('invoice-design') }}" class="{{ Request::is('invoice-design') ? 'active' : '' }}">
                  <span>Invoice Design</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('administration', 'users', 'roles-permissions', 'notes', 'guides', 'email-templates') ? 'active subdrop' : '' }}">
          <i data-feather="settings"></i>
          <span>ADMINISTRATION</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('users', 'roles-permissions') ? 'active subdrop' : '' }}">
              <i data-feather="user"></i>
              <span>Users</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('manage-users') }}" class="{{ Request::is('manage-users') ? 'active' : '' }}">
                  <span>Manage Users</span>
                </a>
              </li>
              <li>
                <a href="{{ url('roles-permissions') }}" class="{{ Request::is('roles-permissions') ? 'active' : '' }}">
                  <span>Roles & Permissions</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ url('notes') }}" class="{{ Request::is('notes') ? 'active' : '' }}">
              <i data-feather="file-text"></i>
              <span>Notes</span>
            </a>
          </li>
          <li>
            <a href="{{ url('guides') }}" class="{{ Request::is('guides') ? 'active' : '' }}">
              <i data-feather="book-open"></i>
              <span>Guides</span>
            </a>
          </li>
          <li>
            <a href="{{ url('email-templates') }}" class="{{ Request::is('email-templates') ? 'active' : '' }}">
              <i data-feather="mail"></i>
              <span>Email Templates</span>
            </a>
          </li>
          <li>
            <a href="{{ url('reminders') }}" class="{{ Request::is('reminders') ? 'active' : '' }}">
              <i data-feather="bell"></i>
              <span>Reminders</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('login-activities') ? 'active subdrop' : '' }}">
          <i data-feather="activity"></i>
          <span>ACTIVITIES</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li>
            <a href="{{ url('login-activities') }}" class="{{ Request::is('login-activities') ? 'active' : '' }}">
              <i data-feather="activity"></i>
              <span>Login Activities</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
</div>
