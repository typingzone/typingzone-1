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
        <a href="javascript:void(0);" class="{{ Request::is('finance-services') ? 'active subdrop' : '' }}">
          <i data-feather="smartphone"></i>
          <span>FINANCE & SERVICES</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('transactions', 'transaction-types', 'transaction-histories', 'archived-transactions', 'invoices') ? 'active subdrop' : '' }}">
              <i data-feather="credit-card"></i>
              <span>Transactions</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('transaction-types') }}" class="{{ Request::is('transaction-types') ? 'active' : '' }}">
                  <span>Transaction Types</span>
                </a>
              </li>
              <li>
                <a href="{{ url('transaction-histories') }}" class="{{ Request::is('transaction-histories') ? 'active' : '' }}">
                  <span>Transaction Histories</span>
                </a>
              </li>
              <li>
                <a href="{{ url('archived-transactions') }}" class="{{ Request::is('archived-transactions') ? 'active' : '' }}">
                  <span>Archived Transactions</span>
                </a>
              </li>
              <li>
                <a href="{{ url('invoices') }}" class="{{ Request::is('invoices') ? 'active' : '' }}">
                  <span>Invoices</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('documents', 'document-names') ? 'active subdrop' : '' }}">
              <i data-feather="file-text"></i>
              <span>Documents</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('manage-documents') }}" class="{{ Request::is('manage-documents') ? 'active' : '' }}">
                  <span>Manage Documents</span>
                </a>
              </li>
              <li>
                <a href="{{ url('document-names') }}" class="{{ Request::is('document-names') ? 'active' : '' }}">
                  <span>Document Names</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="{{ url('orders') }}" class="{{ Request::is('orders') ? 'active' : '' }}">
              <i data-feather="box"></i>
              <span>Orders</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('tools') ? 'active subdrop' : '' }}">
          <i data-feather="tool"></i>
          <span>TOOLS</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li>
            <a href="{{ url('invoice-design') }}" class="{{ Request::is('invoice-design') ? 'active' : '' }}">
              <i data-feather="layout"></i>
              <span>Invoice Design</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('administration', 'users', 'roles-permissions', 'settings') ? 'active subdrop' : '' }}">
          <i data-feather="users"></i>
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
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('settings', 'general-settings', 'notification-preferences') ? 'active subdrop' : '' }}">
              <i data-feather="settings"></i>
              <span>Settings</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="{{ url('general-settings') }}" class="{{ Request::is('general-settings') ? 'active' : '' }}">
                  <span>General Settings</span>
                </a>
              </li>
              <li>
                <a href="{{ url('notification-preferences') }}" class="{{ Request::is('notification-preferences') ? 'active' : '' }}">
                  <span>Notification Preferences</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('extras', 'guide', 'email-templates', 'reminders') ? 'active subdrop' : '' }}">
          <i data-feather="star"></i>
          <span>EXTRAS</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li>
            <a href="{{ url('guide') }}" class="{{ Request::is('guide') ? 'active' : '' }}">
              <i data-feather="book-open"></i>
              <span>Guide</span>
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
        <a href="javascript:void(0);" class="{{ Request::is('activity', 'login-activities', 'activity-log') ? 'active subdrop' : '' }}">
          <i data-feather="activity"></i>
          <span>ACTIVITY</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li>
            <a href="{{ url('login-activities') }}" class="{{ Request::is('login-activities') ? 'active' : '' }}">
              <i data-feather="activity"></i>
              <span>Login Activities</span>
            </a>
          </li>
          <li>
            <a href="{{ url('activity-log') }}" class="{{ Request::is('activity-log') ? 'active' : '' }}">
              <i data-feather="list"></i>
              <span>Activity Log</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
