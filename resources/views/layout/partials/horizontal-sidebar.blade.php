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
</div>
