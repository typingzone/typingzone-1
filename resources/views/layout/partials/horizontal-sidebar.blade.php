<div class="sidebar horizontal-sidebar">
  <div id="sidebar-menu-3" class="sidebar-menu">
    <ul class="nav">
      <!-- Main Menu Section -->
      <li class="submenu">
        <a href="{{ url('index') }}" class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}">
          <i data-feather="grid"></i>
          <span>Main Menu</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li>
            <a href="{{ url('index') }}" class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}">
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
      <!-- Finance & Services Section -->
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('finance-services') ? 'active subdrop' : '' }}">
          <i data-feather="smartphone"></i>
          <span>FINANCE & SERVICES</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('transactions') ? 'active subdrop' : '' }}">
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
            <a href="javascript:void(0);" class="{{ Request::is('documents') ? 'active subdrop' : '' }}">
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
            <a href="javascript:void(0);" class="{{ Request::is('orders') ? 'active subdrop' : '' }}">
              <i data-feather="box"></i>
              <span>Orders</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- Tools Section -->
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
      <!-- Administration Section -->
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('administration') ? 'active subdrop' : '' }}">
          <i data-feather="users"></i>
          <span>ADMINISTRATION</span>
          <span class="menu-arrow"></span>
        </a>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Request::is('users') ? 'active subdrop' : '' }}">
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
            <a href="javascript:void(0);" class="{{ Request::is('settings') ? 'active subdrop' : '' }}">
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
      <!-- Extras Section -->
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('extras') ? 'active subdrop' : '' }}">
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
          <li>
            <a href="{{ url('office-assets') }}" class="{{ Request::is('office-assets') ? 'active' : '' }}">
              <i data-feather="briefcase"></i>
              <span>Office Assets</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- Activity Section -->
      <li class="submenu">
        <a href="javascript:void(0);" class="{{ Request::is('activity') ? 'active subdrop' : '' }}">
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
          <li>
            <a href="{{ url('sales') }}" class="{{ Request::is('sales') ? 'active' : '' }}">
              <i data-feather="shopping-cart"></i>
              <span>Sales</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>